<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataMitra;
use Illuminate\Http\Request;
use App\Models\DataAkunProdusen;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
    $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'nama_perusahaan' => 'required',
        'nomor_legalitas' => 'required',
        'alamat' => 'required',
        'telephone' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
        'id_kemitraan' => 'required',
    ],[
        'required' => 'Semua data harus diisi!',
        'email.email' => 'Masukkan email sesuai dengan format, contoh nama@gmail.com',
    ]);

    try {
        $validator->validate();
        DB::beginTransaction();

        $produsenUser = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'alamat_lengkap' => $request->alamat,
            'telepon' => $request->telephone,
            'role' => 'PRODUSEN',
            'password' => Hash::make($request->password),
            'password_not_hash' => $request->password
        ]);

        DataAkunProdusen::create([
            'id_user' => $produsenUser->id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'nomor_legalitas_usaha' => $request->nomor_legalitas,
            'id_kemitraan' => $request->id_kemitraan
        ]);

        DB::commit();
        return redirect('/manage-users/produsen')->with('success', 'Data produsen berhasil ditambahkan.');
    } catch (ValidationException $e) {
        $errorMessages = $validator->errors()->first();
        return redirect()->back()->with('error', $errorMessages)->withInput();
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
