<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiUserController extends Controller
{
    public function index()
    {
        if (empty(Auth::user())) {
            return redirect()->route('login');
        } else {
            return redirect()->route('adminBeranda');
        }
    }
}
