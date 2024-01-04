<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function show()
    {
        if(Auth::user()) {
            return redirect()->route('admin.dashboard');
        }
        return inertia('Admin/Auth/Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->withErrors([
            'password' => 'Não foi possível efetuar o login, verifique suas informações!',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return  redirect()->route('admin.login');
    }
}
