<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['nis', 'password']);

        if (!auth('siswa')->attempt($credentials)) {
            return redirect()->back()->withErrors([
                'kredensial' => "NIS atau Password salah!"
            ]);
        }

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        auth('siswa')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
