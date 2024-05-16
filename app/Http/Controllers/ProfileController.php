<?php

namespace App\Http\Controllers;

use App\Models\DataAkunProdusen;
use App\Models\DinasNganjuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'telepon' => 'required',
            'alamat_lengkap' => 'required',
            'email' => 'required|email',
            'username' => 'required|min:6|max:30',
            'password' => 'required|min:6|max:30',
            // 'nama_perusahaan' => 'required',
            // 'nomor_legalitas_usaha' => 'required',
        ]);

        try {

            DB::beginTransaction();
            $user = User::find(Auth::user()->id);

            $user->name = $request->name;
            $user->telepon = $request->telepon;
            $user->alamat_lengkap = $request->alamat_lengkap;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);

            $user->save();

            if ($user->role == "PRODUSEN") {
                DataAkunProdusen::where('id_user', $user->id)->update([
                    'nama_perusahaan' => $request->nama_perusahaan,
                    'nomor_legalitas_usaha' => $request->nomor_legalitas_usaha,
                ]);
            }

            if ($user->role == "AKUN DINAS") {
                DinasNganjuk::where('id_user', $user->id)->update([
                    'nama_instansi' => $request->nama_perusahaan,
                    'alamat_lengkap' => $request->alamat_lengkap,
                    'telepon' => $request->telepon,
                ]);
            }

            DB::commit();

            return redirect()->route('profile')->with('success', 'Data Berhasil dirubah.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('profile')->with('error', $th->getMessage());
        }
    }
}