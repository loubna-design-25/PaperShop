<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->usuari === 'admin' && $request->contrasenya === '1234') {
            session(['admin' => true]);
            return redirect()->route('productes.index');
        }
        return back()->with('error', 'Usuari o contrasenya incorrectes');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('productes.index');
    }
}
