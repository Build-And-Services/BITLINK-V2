<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'alamat_lengkap' => 'required',
                'telepon' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('/register')->with('error', 'Semua Data Harus Diisi');
            }

            $notHash = $request->password;
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'alamat_lengkap' => $request->alamat_lengkap,
                'telepon' => $request->telepon,
                'password_not_hash' => $notHash,
                'password' => Hash::make($request->password),
            ]);

            // dd($user);
            return redirect('/login')->with('success', 'Register Berhasil Silahkan Login');
        }  catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function login(Request $request){

        try {
            $credentials = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            // dd($credentials);
            if (count($credentials) == 0) {
                return redirect()->back();
            }else {
                if(Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect('/');
                }
                return redirect('/login')->with('error', 'email atau password yang anda masukkan salah');
            }

        } catch (\Throwable $th) {
            return back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
