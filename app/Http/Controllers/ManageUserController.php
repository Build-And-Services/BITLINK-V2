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
        try {
            DB::beginTransaction();
            $pembeli = DB::table('users')->where('role', 'AKUN DINAS NON NGANJUK')->get();
            DB::commit();
            return view('frontend.users.pembeli.index', compact('pembeli'));

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
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
        $request->validate([
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
        try {
            DB::beginTransaction();
            // dd('aaa');

            // dd($request->all());

            $produsenUser = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'username' => $request->username,
                'alamat_lengkap' => $request->alamat,
                'telepon' => $request->telephone,
                'role' => 'PRODUSEN',
                'password' => Hash::make($request->password),
            ]);
            // dd('sesss');

            DataAkunProdusen::create([
                'id_user' => $produsenUser->id,
                'nama_perusahaan' => $request->nama_perusahaan,
                'nomor_legalitas_usaha' => $request->nomor_legalitas,
                'id_kemitraan' => $request->id_kemitraan
            ]);
            DB::commit();
            return redirect('/manage-users/produsen')->with('success', 'Data produsen berhasil ditambahkan.');
        } catch (\Throwable $e) {
            // dd($e);
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
