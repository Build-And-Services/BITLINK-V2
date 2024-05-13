<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DinasNganjuk;

class DinasNganjukController extends Controller
{
    public function index()
    {
        $akunDinasNganjuk = DinasNganjuk::all();
        return view('akundinasnganjuk.index', compact('akunDinasNganjuk'));
    }

    public function create()
    {
        return view('akundinasnganjuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:50',
            'telepon' => 'required|string|max:15',
            'username' => 'required|string|max:15',
            'password' => 'required|string|max:15',
        ]);

        DinasNganjuk::create($request->all());

        return redirect()->route('akundinasnganjuk.index')
            ->with('success', 'Data akun dinas berhasil ditambahkan.');
    }

    public function show(DinasNganjuk $akunDinasNganjuk)
    {
        return view('akundinasnganjuk.show', compact('akunDinasNganjuk'));
    }

    public function edit(DinasNganjuk $akunDinasNganjuk)
    {
        return view('akundinasnganjuk.edit', compact('akunDinasNganjuk'));
    }

    public function update(Request $request, DinasNganjuk $akunDinasNganjuk)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:50',
            'telepon' => 'required|string|max:15',
            'username' => 'required|string|max:15',
            'password' => 'required|string|max:15',
        ]);

        $akunDinasNganjuk->update($request->all());

        return redirect()->route('akundinasnganjuk.index')
            ->with('success', 'Data akun dinas berhasil diperbarui.');
    }

    public function destroy(DinasNganjuk $akunDinasNganjuk)
    {
        $akunDinasNganjuk->delete();

        return redirect()->route('akundinasnganjuk.index')
            ->with('success', 'Data akun dinas berhasil dihapus.');
    }
}
