<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Auth;
use Session;
use Mail;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // $password= "12345678";
        // $dd=Hash::make($password);
        // dd($dd);
        return view('backend.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }

    public function login_admin(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password], true)){
            if(!empty(Auth::User()->status)){
                if(Auth::User()->is_role == '1'){
                    return redirect()->intended('admin/dashboard');
                }else{
                    return redirect('login')->with('error', 'Not Admin!!');
                }
            }else{
                $user_id = Auth::user()->id;
                Auth::logout();
                $user = User::find($user_id);
                return redirect('login')->with('success', 'This Email Is Not Verified Yet!!');
            }
        }else{
            return redirect()->back()->with('error', 'Please Enter The Correct Information');
        }
    }

    public function forget(Request $request)
    {
        return view('backend.auth.forget');
    }

    public function forget_admin(Request $request)
    {
        $random_password= rand(11111111, 9999999);
        $user= User::where('email', '=', $request->email)->first();
        if(!empty($user)){
            $user->password = Hash::make($random_password);
            $user->save();

            $user->password_random = $random_password;

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Password Send You E-mail, Please Check!');

        }else{
            return redirect()->back()->with('error', 'E-mail ID Not Found');
        }
        // return view('backend.auth.forget');
    }
}
