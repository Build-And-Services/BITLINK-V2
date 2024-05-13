<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMitra;

class DataMitraController extends Controller
{
    public function index()
    {
        $dataMitras = DataMitra::all();
        return view('data_mitras.index', compact('dataMitras'));
    }

    public function create()
    {
        return view('data_mitras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mitra' => 'required|string|max:255',
        ]);

        DataMitra::create($request->all());

        return redirect()->route('data-mitra.index')
            ->with('success', 'Data mitra berhasil ditambahkan.');
    }

    public function show(DataMitra $dataMitra)
    {
        return view('data_mitras.show', compact('dataMitra'));
    }

    public function edit(DataMitra $dataMitra)
    {
        return view('data_mitras.edit', compact('dataMitra'));
    }

    public function update(Request $request, DataMitra $dataMitra)
    {
        $request->validate([
            'nama_mitra' => 'required|string|max:255',
        ]);

        $dataMitra->update($request->all());

        return redirect()->route('data-mitra.index')
            ->with('success', 'Data mitra berhasil diperbarui.');
    }

    public function destroy(DataMitra $dataMitra)
    {
        $dataMitra->delete();

        return redirect()->route('data-mitra.index')
            ->with('success', 'Data mitra berhasil dihapus.');
    }
}
