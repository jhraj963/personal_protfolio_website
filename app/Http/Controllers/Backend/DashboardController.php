<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use Str;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('backend.dashboard.list');
    }

    public function admin_home(Request $request)
    {
        $data['getrecord']= Home::all();
        return view('backend.home.list', $data);
    }

    public function admin_home_post(Request $request)
    {
        // dd($request->all());

        if($request->add_to_update == "Add"){
            $insertRecord = new Home;

            $insertRecord = request()->validate([
                'profile'=>'required'
            ]);
        }else{
            $insertRecord = Home::find($request->id);
        }
        
        $insertRecord->your_name = trim($request->your_name);
        $insertRecord->work_experience = trim($request->work_experience);
        $insertRecord->description = trim($request->description);
        if(!empty($request->file('profile'))){
            if(!empty($insertRecord->profile) && file_exists('profile/'. $insertRecord->profile)){
                unlink('profile/'. $insertRecord->profile);
            }
            $file       =   $request->file('profile');
            $randomStr  =   Str::random(30);
            $filename   =   $randomStr.'.'.$file->getClientOriginalExtension();
            $file->move('profile/', $filename);
            $insertRecord->profile = $filename;
        }
        $insertRecord->save();
        return redirect()->back()->with('success',"Home Page Successfully Save");
    }

    public function admin_about(Request $request)
    {
        return view('backend.about.list');
    }

    public function admin_about_post(Request $request)
    {
        // dd($request->all());
        $insertRecord= new About;
        $insertRecord->name = trim($request->name);
        $insertRecord->address = trim($request->address);
        $insertRecord->number = trim($request->number);
        $insertRecord->email = trim($request->email);
        $insertRecord->solutions = trim($request->solutions);
        $insertRecord->cases = trim($request->cases);
        $insertRecord->customers = trim($request->customers);
        $insertRecord->consultant = trim($request->consultant);

        $insertRecord->save();
        return redirect()->back()->with('success', "About Page Successfully Save");
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
