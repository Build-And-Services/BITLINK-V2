<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataKontrakPembelian;

class DataKontrakPembelianController extends Controller
{
    
    public function index()
    {
        $dataKontrakPembelian = DataKontrakPembelian::all();
        return view('datakontrakpembelian.index', compact('dataKontrakPembelian'));
    }

    public function create()
    {
        return view('datakontrakpembelian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_kontrakpembelian' => 'required|date',
            'nama_instansi' => 'required|string|max:100',
            'id_benih' => 'required|integer',
            'tgl_pengiriman' => 'required|date',
            'pembayaran' => 'required|string|max:50',
            'status_kontrak' => 'required|string|max:100',
        ]);

        DataKontrakPembelian::create($request->all());

        return redirect()->route('datakontrakpembelian.index')
            ->with('success', 'Data kontrak pembelian berhasil ditambahkan.');
    }

    public function show(DataKontrakPembelian $dataKontrakPembelian)
    {
        return view('datakontrakpembelian.show', compact('dataKontrakPembelian'));
    }

    public function edit(DataKontrakPembelian $dataKontrakPembelian)
    {
        return view('datakontrakpembelian.edit', compact('dataKontrakPembelian'));
    }

    public function update(Request $request, DataKontrakPembelian $dataKontrakPembelian)
    {
        $request->validate([
            'tgl_kontrakpembelian' => 'required|date',
            'nama_instansi' => 'required|string|max:100',
            'id_benih' => 'required|integer',
            'tgl_pengiriman' => 'required|date',
            'pembayaran' => 'required|string|max:50',
            'status_kontrak' => 'required|string|max:100',
        ]);

        $dataKontrakPembelian->update($request->all());

        return redirect()->route('datakontrakpembelian.index')
            ->with('success', 'Data kontrak pembelian berhasil diperbarui.');
    }

    public function destroy(DataKontrakPembelian $dataKontrakPembelian)
    {
        $dataKontrakPembelian->delete();

        return redirect()->route('datakontrakpembelian.index')
            ->with('success', 'Data kontrak pembelian berhasil dihapus.');
    }
}
