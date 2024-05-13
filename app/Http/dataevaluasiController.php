<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEvaluasi;

class DataEvaluasiController extends Controller
{
    public function index()
    {
        $dataEvaluasi = DataEvaluasi::all();
        return view('dataevaluasi.index', compact('dataEvaluasi'));
    }

    public function create()
    {
        return view('dataevaluasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_akunp' => 'required|integer',
            'tgl_evaluasi' => 'required|date',
            'kinerja_produksi' => 'required|string',
            'kualitas_benih' => 'required|string|max:50',
            'kendala_produksi' => 'required|string',
            'saran_produksi' => 'required|string',
        ]);

        DataEvaluasi::create($request->all());

        return redirect()->route('dataevaluasi.index')
            ->with('success', 'Data evaluasi berhasil ditambahkan.');
    }

    public function show(DataEvaluasi $dataEvaluasi)
    {
        return view('dataevaluasi.show', compact('dataEvaluasi'));
    }

    public function edit(DataEvaluasi $dataEvaluasi)
    {
        return view('dataevaluasi.edit', compact('dataEvaluasi'));
    }

    public function update(Request $request, DataEvaluasi $dataEvaluasi)
    {
        $request->validate([
            'id_akunp' => 'required|integer',
            'tgl_evaluasi' => 'required|date',
            'kinerja_produksi' => 'required|string',
            'kualitas_benih' => 'required|string|max:50',
            'kendala_produksi' => 'required|string',
            'saran_produksi' => 'required|string',
        ]);

        $dataEvaluasi->update($request->all());

        return redirect()->route('dataevaluasi.index')
            ->with('success', 'Data evaluasi berhasil diperbarui.');
    }

    public function destroy(DataEvaluasi $dataEvaluasi)
    {
        $dataEvaluasi->delete();

        return redirect()->route('dataevaluasi.index')
            ->with('success', 'Data evaluasi berhasil dihapus.');
    }
}
