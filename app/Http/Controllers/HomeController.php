<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    public function index()
    {
        $data['getrecord'] = Home::all();
        return view('index', $data);
    }

    public function about()
    {
        return view('about');
    }
}
