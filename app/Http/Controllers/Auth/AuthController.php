<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    
        // Autentikasi pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Jika pengguna adalah admin, arahkan ke admin dashboard
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            // Jika bukan admin, arahkan ke dashboard biasa
            return redirect()->route('dashboard');
        }
    
        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
