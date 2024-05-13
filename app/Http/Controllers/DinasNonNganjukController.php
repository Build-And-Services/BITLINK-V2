<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DinasLuarDaerah;

class DinasLuarDaerahController extends Controller
{
    public function index()
    {
        $akunDinasLuarDaerah = DinasLuarDaerah::all();
        return view('akundinasluardaerah.index', compact('akunDinasLuarDaerah'));
    }

    public function create()
    {
        return view('akundinasluardaerah.create');
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

        DinasLuarDaerah::create($request->all());

        return redirect()->route('akundinasluardaerah.index')
            ->with('success', 'Data akun dinas luar daerah berhasil ditambahkan.');
    }

    public function show(DinasLuarDaerah $akunDinasLuarDaerah)
    {
        return view('akundinasluardaerah.show', compact('akunDinasLuarDaerah'));
    }

    public function edit(DinasLuarDaerah $akunDinasLuarDaerah)
    {
        return view('akundinasluardaerah.edit', compact('akunDinasLuarDaerah'));
    }

    public function update(Request $request, DinasLuarDaerah $akunDinasLuarDaerah)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:50',
            'telepon' => 'required|string|max:15',
            'username' => 'required|string|max:15',
            'password' => 'required|string|max:15',
        ]);

        $akunDinasLuarDaerah->update($request->all());

        return redirect()->route('akundinasluardaerah.index')
            ->with('success', 'Data akun dinas luar daerah berhasil diperbarui.');
    }

    public function destroy(DinasLuarDaerah $akunDinasLuarDaerah)
    {
        $akunDinasLuarDaerah->delete();

        return redirect()->route('akundinasluardaerah.index')
            ->with('success', 'Data akun dinas luar daerah berhasil dihapus.');
    }
}
