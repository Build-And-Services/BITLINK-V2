<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect('/login')->with('success', 'register berhasil silahkan login');
        }  catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            if(Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
