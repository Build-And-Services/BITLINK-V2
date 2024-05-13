<?php

namespace App\Http\Controllers;

use App\Models\BenihData;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = \DB::table('pesanan')
            ->select(
                'pesanan.id AS id',
                'benih_data.foto_benih AS foto_benih',
                'benih_data.varietas AS varietas',
                'pesanan.harga AS harga',
                'data_akun_produsen.nama_perusahaan AS nama_perusahaan',
                'benih_data.stok_benih AS stok_benih',
                'benih_data.jenis_benih AS jenis_benih',
                'benih_data.kualitas_benih AS kualitas_benih',
                'pesanan.snap_token AS snap_token',
                'pesanan.status_pembayaran AS status_pembayaran'
            )
            ->join('benih_data', 'pesanan.id_benih', '=', 'benih_data.id_benih')
            ->join('data_akun_produsen', 'benih_data.id_akunp', '=', 'data_akun_produsen.id_user')
            ->where('pesanan.id_user', \Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();
        return view('frontend.pesanan.index', compact('pesanan'));
    }
    public function invoice($id)
    {
        $pesanan = Pesanan::with(['pembeli', 'benihData'])->where('id', $id)->first();
        $perusahaan = \DB::table('benih_data')
            ->where('id_benih', $pesanan->id_benih)
            ->join('users', 'users.id', '=', 'benih_data.id_akunp')
            ->join('data_akun_produsen', 'data_akun_produsen.id_user', '=', 'users.id')
            ->select([
                'data_akun_produsen.nama_perusahaan',
                'data_akun_produsen.nomor_legalitas_usaha',
                'users.alamat_lengkap'
            ])->first();
        return view(
            'frontend.pesanan.invoice',
            [
                'getDetailInvoice' => $pesanan,
                'getPerusahaan' => $perusahaan
            ]
        );
    }
    public function cekPengiriman(Request $request)
    {
        // Temukan pesanan berdasarkan ID pembayaran
        $pesanan = Pesanan::find($request->id_pembayaran);

        if ($pesanan) {
            return response()->json([
                'status_pengiriman' => $pesanan->status_pengiriman
            ]);
        } else {
            // Pesanan tidak ditemukan, kirim respons dengan pesan kesalahan
            return response()->json([
                'error' => 'Pesanan tidak ditemukan'
            ], 404);
        }
    }
    public function updateStatusPengiriman(Request $request)
    {
        try {
            \DB::beginTransaction();
            $pesanan = Pesanan::find($request->id_pembayaran_result);
            $pesanan->update([
                'status_pengiriman' => 'DITERIMA',
                'tgl_diterima' => now()
            ]);
            \DB::commit();
            return response()->json([
                'status_pengiriman' => $pesanan->status_pengiriman
            ]);
        } catch (\Throwable $th) {
            \DB::rollBack();
            return response()->json('failed');
        }

    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_penerima' => 'required|string',
                'alamat_lengkap' => 'required|string',
                'telepon' => 'required', // Hapus aturan validasi untuk integer pada telepon
            ], [
                'nama_penerima.required' => 'Nama penerima harus diisi.',
                'telepon' => 'Gagal, Data tidak valid!'
            ]);

            $pesanan = Pesanan::create($request->all());
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $pesanan->id,
                    'gross_amount' => $request->quantity * $request->harga,
                ),
                'customer_details' => array(
                    'name' => \Auth::user()->name,
                    'email' => \Auth::user()->email,
                    'phone' => $request->telepon,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $pesanan->snap_token = $snapToken;
            $pesanan->save();

            $benih = BenihData::with([
                'akunProdusen' => function ($query) {
                    $query->with('dataProdusen');
                }
            ])->where('id_benih', $pesanan->id_benih)->first();
            return view('frontend.pesanan.checkout', compact('pesanan', 'benih', 'snapToken'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function riwayat($id)
    {
        try {
            $riwayat = Pesanan::findOrFail($id);
            $perusahaan = \DB::table('benih_data')
                ->where('id_benih', $riwayat->id_benih)
                ->join('users', 'users.id', '=', 'benih_data.id_akunp')
                ->join('data_akun_produsen', 'data_akun_produsen.id_user', '=', 'users.id')
                ->select([
                    'data_akun_produsen.nama_perusahaan',
                    'data_akun_produsen.nomor_legalitas_usaha',
                    'users.alamat_lengkap'
                ])->first();
            return view(
                'frontend.pesanan.history',
                [
                    'getRiwayat' => $riwayat,
                    'getPerusahaan' => $perusahaan
                ]
            );
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
