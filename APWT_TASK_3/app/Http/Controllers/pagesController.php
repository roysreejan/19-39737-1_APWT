<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Admin;
use Illuminate\Support\Facades\Cookie;

class pagesController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function loginSubmit(Request $request){
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
        ]);

        $userName = $request->input('email');
        $password = $request->input('password');

        $user = Users::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if($user && $user->role == "admin"){
            $request->session()->put('user', $user->name);
            return redirect()->route('homeAdmin');
        }
        elseif($user && $user->role == "user"){
            $request->session()->put('user', $user->name);
            return redirect()->route('homeUser');
        }
        else{
            return "User name and Password do not match";
        }
    }
    public function logout(){
        session()->forget('user');
        return view('pages.login');
    }
    public function registration(){
        return view('pages.registration');
    }
    public function registrationSubmit(Request $request){
        $validate = $request->validate([
            'name' => 'required| min:3',
            'email' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'dob' => 'required',
            'gender' => 'required'
        ],
        ['name.required'=>"Please put you name here",
        'name.min'=>"Name must be at least 3 characters long"],
    );
        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = "user";
        $user->save();

        return view('user.homeUser');
    }
    public function profile(Request $request){
        $user_name = session()->get('user');
        $user = Users::where('name', $user_name)->first();
        return view('user.profileUser')->with('user', $user);   
    }
    public function profileEdit(Request $request){
        $user = Users::where('name', $request->name)->where('role', 'user')->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = "user";
        $user->save();
        return redirect()->route('homeUser');
    }

    //.................Admin...............//
    public function profileAdmin(Request $request){
        $user_name = session()->get('user');
        $user = Users::where('name', $user_name)->first();
        return view('admin.profileAdmin')->with('user', $user);
    }
    public function profileAdminSubmit(Request $request){
        $user = Users::where('name', $request->name)->where('role', 'admin')->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->role = 'admin';
        $user->save();
        return redirect()->route('homeAdmin');
    }
    public function list(){
        $users = Users::where('role', 'user')->get();
        return view('admin.list')->with('users', $users);
    }
    public function editUser(Request $request){
        $user = Users::where('name', $request->name)->first();
        return view('admin.editUser')->with('user', $user);
    }
    public function editUserSubmit(Request $request){
        $user = Users::where('name', $request->name)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        //$user->gender = $request->gender;
        $user->save();

        return redirect()->route('listAdmin');
    }
    public function deleteUser(Request $request){
        $user = Users::where('name', $request->name)->first();
        return view('admin.deleteUser')->with('user', $user);
    }
    public function deleteUserSubmit(Request $request){
        $user = Users::where('name', $request->name)->first();
        $user->delete();
        return redirect()->route('listAdmin');
    }
    public function addUser(){
        return view('admin.addUser');
    }
    public function addUserSubmit(Request $request){
        $validate = $request->validate([
            'name' => 'required| min:3',
            'email' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' =>'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'dob' => 'required',
            'gender' => 'required'
        ],
        ['name.required'=>"Please put you name here",
        'name.min'=>"Name must be at least 3 characters long"],
    );
        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = "user";
        $user->save();

        return redirect()->route('listAdmin');
    }
}


