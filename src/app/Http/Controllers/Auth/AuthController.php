<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('Auth.login');
    }
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Pengguna berhasil login
            $request->session()->regenerate();
            return response()->json(['message' => 'Login Success', 'success' => true]);
        } else {
            // Gagal login
            return response()->json(['message' => 'Login Failed', 'success' => false], 401);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    
}
