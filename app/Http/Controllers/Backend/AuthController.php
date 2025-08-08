<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('backend.auth.login');
    }

    public function forget(Request $request)
    {
        return view('backend.auth.forget');
    }
}
