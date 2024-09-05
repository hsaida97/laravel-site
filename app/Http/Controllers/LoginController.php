<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $cred = $request->only('email', 'password');
        if (Auth::attempt($cred)) {
            return redirect()->route('admin.pages.dashboard');
        } else {
            return redirect()->route('login')->withErrors('Giriş yapılamadı');
        }
    }
}
