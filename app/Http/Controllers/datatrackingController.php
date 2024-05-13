<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTracking;

class DataTrackingController extends Controller
{
    public function index()
    {
        $dataTracking = DataTracking::all();
        return view('datatracking.index', compact('dataTracking'));
    }

    public function create()
    {
        return view('datatracking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Status' => 'required|string|max:50',
            'id_kontrakpembelian' => 'required|integer',
        ]);

        DataTracking::create($request->all());

        return redirect()->route('datatracking.index')
            ->with('success', 'Data tracking berhasil ditambahkan.');
    }

    public function show(DataTracking $dataTracking)
    {
        return view('datatracking.show', compact('dataTracking'));
    }

    public function edit(DataTracking $dataTracking)
    {
        return view('datatracking.edit', compact('dataTracking'));
    }

    public function update(Request $request, DataTracking $dataTracking)
    {
        $request->validate([
            'Status' => 'required|string|max:50',
            'id_kontrakpembelian' => 'required|integer',
        ]);

        $dataTracking->update($request->all());

        return redirect()->route('datatracking.index')
            ->with('success', 'Data tracking berhasil diperbarui.');
    }

    public function destroy(DataTracking $dataTracking)
    {
        $dataTracking->delete();

        return redirect()->route('datatracking.index')
            ->with('success', 'Data tracking berhasil dihapus.');
    }
}
