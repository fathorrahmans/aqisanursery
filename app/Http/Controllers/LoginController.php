<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        request()->validate(
            [
                // 'email' => 'required|email:dns',
                'email' => 'required',
                'password' => 'required',
            ]
        );
        $kredensil = $request->only('email', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if (!empty($user)) {
                return redirect()->route('adminBeranda');
            }
            return redirect()->route('login');
            # code...
        }
        return back()->with('loginError', 'Login gagal !!!');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
