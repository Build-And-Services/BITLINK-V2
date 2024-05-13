<?php

namespace App\Http\Controllers;

use App\Models\DataAkunProdusen;
use App\Models\DataMitra;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function pembeli()
    {
        return view('frontend.users.pembeli.index');
    }

    public function produsen()
    {
        try {
            DB::beginTransaction();
            $produsenData = DataAkunProdusen::with('user')->get();
            DB::commit();
            return view('frontend.users.produsen.index', compact('produsenData'));
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function createProdusen(): View
    {
        try {
            $mitra = DataMitra::all();
            return view('frontend.users.produsen.add', compact('mitra'));
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function storeProdusen(Request $request)
    {
        try {
            DB::beginTransaction();
            // dd('aaa');
            $validated = $request->validate([
                'nama' => 'required',
                'nama_perusahaan' => 'required',
                'nomor_legalitas' => 'required',
                'alamat' => 'required',
                'telephone' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'id_kemitraan' => 'required'
            ]);

            $produsenUser = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'username' => $request->username,
                'alamat_lengkap' => $request->alamat,
                'telepon' => $request->telephone,
                'password' => Hash::make($request->password),
                'role' => 'PRODUSEN'
            ]);

            DataAkunProdusen::create([
                'id_user' => $produsenUser->id,
                'nama_perusahaan' => $request->nama_perusahaan,
                'nomor_legalitas_usaha' => $request->nomor_legalitas,
                'id_kemitraan' => $request->id_kemitraan
            ]);
            DB::commit();
            return redirect('/manage-users/produsen')->with('success', 'Data produsen berhasil ditambahkan.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }



    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
