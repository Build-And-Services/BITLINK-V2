<?php

namespace App\Http\Controllers;

use App\Models\BenihData;
use Illuminate\Http\Request;
use App\Models\DataKontrakPembelian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BenihDataController extends Controller
{

    public function index()
    {
        $benihData = BenihData::all();
        return view('frontend.display', compact('benihData'));
    }

    public function create()
    {
        $perusahaan = Auth::user();
        return view('frontend.product.tambah', [
            'getPerusahaan' => $perusahaan
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'varietas' => 'required|string|max:255',
                'jenis_benih' => 'required|string|max:50',
                'stok_benih' => 'required|integer',
                'kualitas_benih' => 'required|string|max:100',
                'harga_benih' => 'required|numeric',
                'foto_benih' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tgl_masuk' => 'required|date',
                'turun_gudang' => 'required|integer',
                'jemur_kering' => 'required|integer',
                'blower1' => 'required|integer',
                'benih_susut' => 'required|integer',
                'biji_kecil' => 'required|integer',
                'jumlah_benih' => 'required|integer',
                'id_akunp' => 'required|exists:data_akun_produsen,id_user'
            ]);

            // Simpan foto ke direktori public/img
            $fotoName = time() . '.' . $request->foto_benih->extension();
            $request->foto_benih->move(public_path('img/benih'), $fotoName);

            // Ubah path foto dalam $validatedData
            $validatedData['foto_benih'] = '/img/benih/'.$fotoName;

            // Membuat data benih baru
            $benihData = BenihData::create($validatedData);

            // Mengarahkan ke halaman detail dengan mengirim id benih yang baru saja dibuat
            return redirect('/'. $benihData->jenis_benih.'/detail/'.$benihData->id_benih)->with('success', 'Data benih berhasil ditambahkan.');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }

    }


    public function detail($id)
    {
        $benihData = BenihData::findOrFail($id);
        return view('frontend.detail', compact('benihData'));
    }

    public function detailpertanian($id)
    {
        $benihData = BenihData::findOrFail($id);
        return view('frontend.detailP', compact('benihData'));
    }


    public function show($id)
    {
        $benihData = BenihData::findOrFail($id);
        return view('frontend.detail', compact('benihData'));
    }

    public function edit($id)
    {
        $benihData = BenihData::findOrFail($id);
        $perusahaan = Auth::user();
        return view('frontend.edit', compact('benihData', 'perusahaan'));
    }


    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'varietas' => 'required|string|max:255',
                'jenis_benih' => 'required|string|max:50',
                'stok_benih' => 'required|integer',
                'kualitas_benih' => 'required|string|max:100',
                'harga_benih' => 'required|numeric',
                'foto_benih' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tgl_masuk' => 'required|date',
                'turun_gudang' => 'required|integer',
                'jemur_kering' => 'required|integer',
                'blower1' => 'required|integer',
                'benih_susut' => 'required|integer',
                'biji_kecil' => 'required|integer',
                'jumlah_benih' => 'required|integer',
                'id_akunp' => 'required|exists:data_akun_produsen,id_user'
            ]);

            $benihData = BenihData::findOrFail($id);

            // Perbarui foto_benih hanya jika foto baru diunggah
            if ($request->hasFile('foto_benih')) {
                $fotoName = time() . '.' . $request->foto_benih->extension();
                $request->foto_benih->move(public_path('img/benih'), $fotoName);
                $validatedData['foto_benih'] = '/img/benih/'.$fotoName;

                // Hapus foto lama jika ada
                if (Storage::exists('public/img/benih' . $benihData->foto_benih)) {
                    Storage::delete('public/img/benih' . $benihData->foto_benih);
                }
            }

            // Update data bibit
            $benihData->varietas = $validatedData['varietas'];
            $benihData->jenis_benih = $validatedData['jenis_benih'];
            $benihData->stok_benih = $validatedData['stok_benih'];
            $benihData->kualitas_benih = $validatedData['kualitas_benih'];
            $benihData->harga_benih = $validatedData['harga_benih'];
            $benihData->foto_benih = $validatedData['foto_benih'] ?? $benihData->foto_benih;
            $benihData->tgl_masuk = $validatedData['tgl_masuk'];
            $benihData->turun_gudang = $validatedData['turun_gudang'];
            $benihData->jemur_kering = $validatedData['jemur_kering'];
            $benihData->blower1 = $validatedData['blower1'];
            $benihData->benih_susut = $validatedData['benih_susut'];
            $benihData->biji_kecil = $validatedData['biji_kecil'];
            $benihData->jumlah_benih = $validatedData['jumlah_benih'];
            $benihData->id_akunp = $validatedData['id_akunp'];
            $benihData->save();

            return redirect()->route('frontend.detail', $benihData->id_benih)->with('success', 'Data benih berhasil diperbarui.');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }


    }


    public function destroy($id)
    {
        $benihData = BenihData::findOrFail($id);
        $benihData->delete();

        return redirect()->route('frontend.display')->with('success', 'Benih data deleted successfully.');
    }
    public function displayPadi()
    {
        $benihData = BenihData::where('jenis_benih', 'Padi')->get();
        return view('frontend.display', compact('benihData'));
    }

    public function displayKedelai()
    {
        $benihData = BenihData::where('jenis_benih', 'Kedelai')->get();
        return view('frontend.displayK', compact('benihData'));
    }

    public function displayPadiPertanian()
    {
        $benihData = BenihData::where('jenis_benih', 'Padi')->get();
        return view('frontend.displayP', compact('benihData'));
    }

    public function displayKedelaiPertanian()
    {
        $benihData = BenihData::where('jenis_benih', 'Kedelai')->get();
        return view('frontend.displayKP', compact('benihData'));
    }

    // public function detailPesanan(Request $request, $id)
    // {
    //     $benihData = BenihData::findOrFail($id);
    //     $quantity = $request->input('quantity');

    //     return view('frontend.detailpesan', compact('benihData', 'quantity'));
    // }
    public function pesan(Request $request, $id)
    {
        $benihData = BenihData::findOrFail($id);
        $quantity = $request->input('quantity');

        // Simpan quantity sementara ke dalam tabel datakontrakpembelian
        // Pastikan ada validasi yang sesuai dengan kebutuhan aplikasi Anda
        $kontrakPembelian = new DataKontrakPembelian();
        $kontrakPembelian->tgl_kontrakpembelian = now(); // Tanggal kontrak
        $kontrakPembelian->id_akunm = auth()->user()->id_akunm; // ID akun pengguna yang sedang login
        $kontrakPembelian->id_benih = $id; // ID benih yang dipesan
        $kontrakPembelian->quantity = $quantity; // Quantity yang dipesan
        $kontrakPembelian->alamat_lengkap = ''; // Isi sesuai dengan data pengguna
        $kontrakPembelian->email = ''; // Isi sesuai dengan data pengguna
        $kontrakPembelian->telepon = ''; // Isi sesuai dengan data pengguna
        $kontrakPembelian->tgl_pengiriman = now(); // Tanggal pengiriman
        $kontrakPembelian->pembayaran = ''; // Metode pembayaran
        $kontrakPembelian->status_kontrak = 'pending'; // Status kontrak (default: pending)
        $kontrakPembelian->save();

        return redirect()->route('frontend.detailpesan', $id)->with('success', 'Pesanan berhasil ditambahkan.');
    }


}
