<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Dotenv\Exception\ValidationException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $view_users = Users::get();
        // return view('admin.layout.users', compact('view_users'));
        $users = users::all(); // Replace with your actual data retrieval logic
        return view('admin.layout.users', ['users' => $users]);
    }

    public function change_status($id)//to check if is active or not
    {
        $user_data = users::where('id',$id)->first();
        if($user_data->status == 1) {
            $user_data->status = 0;
        } else {
            $user_data->status = 1;
        }
        $user_data->update();
        return redirect()->back()->with('success', 'Status is changed successfully.');
    }
    public function change_userState($id)//to check if is admin
    {
        $user_data = users::where('id',$id)->first();
        if($user_data->userState == 0) {
            $user_data->userState = 1;
        } else {
            $user_data->userState = 0;
        }
        $user_data->update();
        return redirect()->back()->with('success', 'userState is changed successfully.');
    }
    // public function add()
    // {
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layout.users_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);


            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
                'firstName' => 'required | min:4 ,max:10',
                'lastName' => 'required | min:4 ,max:10',
                'email' => 'required|email|unique:users',
                'password' => 'required | min:8,max:32', 
                'retype_password' => 'required|same:password',
                'phoneNumber' => 'required| max:10',
                'city' => 'required | min:4 ,max:20',
                'address' => 'required| max:255',
            ]);
            $ext = $request->file('photo')->extension();
            $final_name = time() . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $obj = new users();
            $obj->photo = $final_name;
            $obj->firstName = $request->firstName;
            $obj->lastName = $request->lastName;
            $obj->email = $request->email;

            $obj->password = Crypt::encrypt($request->password);
            $obj->phoneNumber = $request->phoneNumber;
            $obj->city = $request->city;
            $obj->address = $request->address;
            $obj->userState = 0; //to check if is admin
            $obj->status = 1; //to check if is active or not
            $obj->save();
            if ($obj) {
                return redirect()->route('view_users')->with('success', 'add user is successfully.');
                // return $request->input();
            }

    }
        
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users , $id)
    {

        // $users_data = users::where('id',$id)->first();
        // return view('admin.layout.users_edit', compact('admin_users_edit'));
        $users_data = users::where('id', $id)->first();
        return view('admin.layout.users_edit', compact('users_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try {
            $obj = users::where('id',$id)->first();
            if($request->hasFile('photo')) {
                $request->validate([
                    // 'photo' => 'image'
                    'photo' => 'image|mimes:jpg,jpeg,png,gif'
                ]);
                unlink(public_path('uploads/'.$obj->photo));
                $ext = $request->file('photo')->extension();
                $final_name = time().'.'.$ext;
                $request->file('photo')->move(public_path('uploads/'),$final_name);
                $obj->photo = $final_name;
            }
            

            $obj->firstName = $request->firstName;
            $obj->lastName = $request->lastName;
            $obj->email = $request->email;
            // $obj->password = $request->password;
            // $obj->password = Crypt::decryptString($request->password);
            $obj->password = Crypt::encrypt($request->password);
            $obj->phoneNumber = $request->phoneNumber;
            $obj->city = $request->city;
            $obj->address = $request->address;
            $obj->userState = 0; //to chack is admin 
            $obj->status = 1; //to chack is active or not
            $obj->update();
            if ($obj) {
                return redirect()->route('view_users')->with('success', 'users is updated successfully.');
            }
        } 
        catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        // $single_data = users::where('id',$id)->first();
        // unlink(public_path('uploads/'.$single_data->photo));
        // $single_data->delete();
        users::findorFail($id)->delete();

        return redirect()->back()->with('success', 'users is deleted successfully.');
    }
}



//     public function store(Request $request)
// {
//     try {
//         $request->validate([
//             'photo' => 'required|image',
//             'firstName' => 'required',
//             'lastName' => 'required',
//             'email' => 'required|email|unique:users',
//             'password' => 'required',
//             'retype_password' => 'required|same:password',
//             'city' => 'required',
//             'address' => 'required',
//         ]);

//         if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
//             $ext = $request->file('photo')->extension();
//             $final_name = time() . '.' . $ext;
//             $request->file('photo')->move(public_path('uploads/'), $final_name);
//         }

//         $users = users::create([
//             'firstName' => $request->input('firstName'),
//             'lastName' => $request->input('lastName'),
//             'email' => $request->input('email'),
//             'password' => $request->input('password'),
//             'photo' => $final_name ?? null, // Use the uploaded photo if available
//             'phoneNumber' => $request->input('phoneNumber'),
//             'city' => $request->input('city'),
//             'address' => $request->input('address') 
//         ]);

//         if ($users) {
//             return redirect()->route('view_users')->with('success', 'User is added successfully.');
//         }

//         return redirect()->route('view_users')->with('error', 'Failed to add user.');
//     } catch (ValidationException $e) {
//         return redirect()->back()->withErrors($e->errors());


//     }
// }