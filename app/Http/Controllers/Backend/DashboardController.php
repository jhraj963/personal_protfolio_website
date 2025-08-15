<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('backend.dashboard.list');
    }

    public function admin_home(Request $request)
    {
        return view('backend.home.list');
    }

    public function admin_about(Request $request)
    {
        return view('backend.about.list');
    }

    public function admin_portfolio(Request $request)
    {
        return view('backend.portfolio.list');
    }

    public function admin_contact(Request $request)
    {
        return view('backend.contact.list');
    }

    public function admin_blog(Request $request)
    {
        return view('backend.blog.list');
    }
}
