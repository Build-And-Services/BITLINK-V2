<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAkunProdusen;
use App\Models\DataMitra;

class DataAkunProdusenController extends Controller
{
    public function index()
    {
        $akunProdusen = DataAkunProdusen::all();
        return view('akunprodusen.index', compact('akunProdusen'));
    }

    public function create()
    {
        $mitra = DataMitra::all();
        return view('akunprodusen.create', compact('mitra'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'nama_perusahaan' => 'required',
            'nomor_legalitas_usaha' => 'required',
            'alamat_lengkap' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'username' => 'required|unique:data_akun_produsen',
            'password' => 'required',
            'id_kemitraan' => 'required|exists:kemitraan_data,id_kemitraan'
        ]);

        DataAkunProdusen::create($request->all());
        return redirect()->route('akunprodusen.index')->with('success', 'Data Akun Produsen berhasil ditambahkan');
    }

    public function edit($id)
    {
        $akunProdusen = DataAkunProdusen::findOrFail($id);
        $mitra = DataMitra::all();
        return view('akunprodusen.edit', compact('akunProdusen', 'mitra'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'nama_perusahaan' => 'required',
            'nomor_legalitas_usaha' => 'required',
            'alamat_lengkap' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'username' => 'required|unique:data_akun_produsen,username,' . $id . ',id_akunp',
            'password' => 'required',
            'id_kemitraan' => 'required|exists:kemitraan_data,id_kemitraan'
        ]);

        $akunProdusen = DataAkunProdusen::findOrFail($id);
        $akunProdusen->update($request->all());
        return redirect()->route('akunprodusen.index')->with('success', 'Data Akun Produsen berhasil diperbarui');
    }

    public function destroy($id)
    {
        $akunProdusen = DataAkunProdusen::findOrFail($id);
        $akunProdusen->delete();
        return redirect()->route('akunprodusen.index')->with('success', 'Data Akun Produsen berhasil dihapus');
    }
}
