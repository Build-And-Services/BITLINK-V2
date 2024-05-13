<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEdukasi;

class DataEdukasiController extends Controller
{
    public function index()
    {
        $dataEdukasi = DataEdukasi::all();
        return view('dataedukasi.index', compact('dataEdukasi'));
    }

    public function create()
    {
        return view('dataedukasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_edukasi' => 'required|date',
            'judul_edukasi' => 'required|string',
            'isi_edukasi' => 'required|string',
            'id_akunp' => 'required|integer',
        ]);

        DataEdukasi::create($request->all());

        return redirect()->route('dataedukasi.index')
            ->with('success', 'Data edukasi berhasil ditambahkan.');
    }

    public function show(DataEdukasi $dataEdukasi)
    {
        return view('dataedukasi.show', compact('dataEdukasi'));
    }

    public function edit(DataEdukasi $dataEdukasi)
    {
        return view('dataedukasi.edit', compact('dataEdukasi'));
    }

    public function update(Request $request, DataEdukasi $dataEdukasi)
    {
        $request->validate([
            'tanggal_edukasi' => 'required|date',
            'judul_edukasi' => 'required|string',
            'isi_edukasi' => 'required|string',
            'id_akunp' => 'required|integer',
        ]);

        $dataEdukasi->update($request->all());

        return redirect()->route('dataedukasi.index')
            ->with('success', 'Data edukasi berhasil diperbarui.');
    }

    public function destroy(DataEdukasi $dataEdukasi)
    {
        $dataEdukasi->delete();

        return redirect()->route('dataedukasi.index')
            ->with('success', 'Data edukasi berhasil dihapus.');
    }
}
