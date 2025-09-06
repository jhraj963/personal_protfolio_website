<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use App\Models\Protfolio;

class HomeController extends Controller
{
    public function index()
    {
        $data['getrecord'] = Home::all();
        $data['about'] = About::all();
        $data['protfolio'] = Protfolio::all();
        return view('index', $data);
    }

    // public function about()
    // {
    //     $data['getabout'] = About::all();
    //     return view('index', $data);
    // }
}
