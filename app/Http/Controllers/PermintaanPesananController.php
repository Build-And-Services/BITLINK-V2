<?php

namespace App\Http\Controllers;

use App\Models\BenihData;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PermintaanPesananController extends Controller
{
    public function index()
    {
        try {
            $pesanan = Pesanan::with('benihData', 'pembeli')->latest()->get();
            return view('produsen.permintaan-pesanan.index',
            [
                'getPermintaanPesanan' => $pesanan
            ]
        );
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
    public function invoice($id)
    {
        try {
            $pesanan = Pesanan::with(['pembeli', 'benihData'])->where('id', $id)->first();
            $perusahaan = \DB::table('benih_data')
            ->where('id_benih', $pesanan->id_benih)
            ->join('users', 'users.id', '=', 'benih_data.id_akunp')
            ->join('data_akun_produsen', 'data_akun_produsen.id_user', '=', 'users.id')
            ->select([
                'data_akun_produsen.nama_perusahaan', 'data_akun_produsen.nomor_legalitas_usaha', 'data_akun_produsen.alamat_lengkap'
            ])->first();
            // dd($perusahaan);
            // dd($pesanan);
            // $pesanan = Pesanan::findOrFail($id);
            return view('produsen.permintaan-pesanan.invoice',
            [
                'getDetailInvoice' => $pesanan,
                'getPerusahaan' => $perusahaan
            ]

        );
        } catch (\Throwable $e) {
            // dd($e);
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function distribusi($id)
    {
        try {
            $pesanan = Pesanan::with('benihData', 'pembeli')->where('id', $id)->first();
            // dd($pesanan);
            return view('produsen.distribusi.detail-distribusi', ['getDetailDistribusi' => $pesanan]);
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function trackDistribusi($id) {
        try {
            $pesanan = Pesanan::with('benihData', 'pembeli')->where('id', $id)->first();
            // dd($pesanan->status_pengiriman);
            return view('produsen.distribusi.track-distribusi', ['distribusiPesanan' => $pesanan]);
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function updateStatusPengiriman(Request $request, $id) {
        try {
            $request->validate([
                'status_pengiriman' => 'required|in:PROSES,SEDANG DIKIRIM,DITERIMA',
            ]);
            $pesanan = Pesanan::with('benihData', 'pembeli')->where('id', $id)->first();
            $pesanan->status_pengiriman = $request->status_pengiriman;
            $pesanan->tgl_pengiriman = now();
            $pesanan->save();
            return redirect()->route('track.distribusi', $pesanan->id)->with('success', 'STatus Pengiriman Berhasil di Perbarui');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
