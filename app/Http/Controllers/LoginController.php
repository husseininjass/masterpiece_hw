<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

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




    public function login_submit(Request $request){
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $email = $request->input('email');
        $password = $request->input('password');

        $user = Users::where('email', $email)->first();
        
        if ($user && Hash::check($password, $user->password)) {
            return redirect('/');
        } else {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
        
    }
    





    public function signup()
    {
        return view('front.regstr');
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



    public function store_signup (Request $request){
       
        $data_input = $request->validate([
            'fname' => 'required|alpha|min:3|max:255',
            'lname' => 'required|alpha|min:3|max:255',
            'email' => 'required|email',
            'password' => 'required|max:255|min:8',
            'c-password' => 'required|same:password',
            'phone' => 'required|numeric|digits_between:10,13',
            'city' => 'required', 
            'address' => 'required', 
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        // try{

        
        $user_data = new users(); 
        $user_data->firstName = $data_input['fname'];
        $user_data->lastName = $data_input['lname'];
        $user_data->email = $data_input['email'];
        $user_data->phoneNumber = $data_input['phone'];
        $user_data->city = $data_input['city'];
        $user_data->address = $data_input['address'];
        $user_data->password = $data_input['password'];
        if ($request->hasFile('photo')) {
            $data_input = $request->file('photo');
            $filename =  $data_input->getClientOriginalName();
            $data_input->move(public_path('assets/images'), $filename);

            $user_data->photo = $filename;
    
        }
       
        $user_data->save();
        return(redirect('/login'))->with('success', 'You are now one of our members !');
    

    // catch (QueryException $e){

    //     return back()->withErrors(['email' => 'The email already exist']);

    // }
        

        
    }

}


