<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\About;
use App\Models\Protfolio;
use App\Models\Contact;
use Mail;
use App\Mail\ContactMail;

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

    //Contact send

    public function contact_post(Request $request)
    {
        // dd($request->all());
        $insertRecord = new Contact;
        $insertRecord->name = trim($request->name);
        $insertRecord->email = trim($request->email);
        $insertRecord->subject = trim($request->subject);
        $insertRecord->message = trim($request->message);

        $insertRecord->save();

        Mail::to('protofolio@aliazam.com')->send(new ContactMail($request));

        return redirect()->back()->with('success', "Your Message Successfully Send");
    }
}
