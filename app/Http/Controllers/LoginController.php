<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{

    // public function index()
    // {
    //     return view('front.auth.login');
    // }  
    
    public function login()
    {
        return view('front.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ];
        // guard('users')->
        if (Auth::attempt($credential)) {
            return redirect()->route('home_view_Categories')->with('success', 'add user is successfully.');
        } else {
            return redirect()->route('customer_login')->with('error', 'Information is not correct!');
        }
    }

    public function signup()
    {
        return view('front.signup');
    }

    public function signup_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);


        $token = hash('sha256', time());
        $password = $password = bcrypt($request->password);
        // $verification_link = url('signup-verify/' . $request->email . '/' . $token);

        $obj = new users();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->token = $token;
        $obj->status = 1;
        $obj->save();

        // // Send email
        // $subject = 'Sign Up Verification';
        // $message = 'Please click on the link below to confirm sign up process:<br>';
        // $message .= '<a href="' . $verification_link . '">';
        // $message .= $verification_link;
        // $message .= '</a>';

        // \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'complete the signup');
    }

    public function signup_verify($email, $token)
    {
        $customer_data = users::where('email', $email)->where('token', $token)->first();

        if ($customer_data) {

            $customer_data->token = '';
            $customer_data->status = 1;
            $customer_data->update();

            return redirect()->route('customer_login')->with('success', 'Your account is verified successfully!');
        } else {
            return redirect()->route('customer_login');
        }
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect()->route('customer_login');
    }

    public function forget_password()
    {
        return view('front.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $customer_data = users::where('email', $request->email)->first();
        if (!$customer_data) {
            return redirect()->back()->with('error', 'Email address not found!');
        }

        $token = hash('sha256', time());

        $customer_data->token = $token;
        $customer_data->update();

        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link to reset the password: <br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        // \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('customer_login')->with('success', 'Please check your email and follow the steps there');
    }


    public function reset_password($token, $email)
    {
        $customer_data = users::where('token', $token)->where('email', $email)->first();
        if (!$customer_data) {
            return redirect()->route('customer_login');
        }

        return view('front.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $customer_data = users::where('token', $request->token)->where('email', $request->email)->first();

        $customer_data->password = Crypt::encrypt($request->password);
        $customer_data->token = '';
        $customer_data->update();

        return redirect()->route('customer_login')->with('success', 'Password is reset successfully');
    }

}