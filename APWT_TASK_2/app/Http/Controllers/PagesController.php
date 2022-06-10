<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    function login()
    {
        return view('pages.login');
    }

    function checkuser(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ],
        ['name.required'=>"Please put you name here"],
        );
        $user=array("name"=>"sreejan","password"=>"123456");
        $name=$request->input('name');
        $password=$request->input('password');
        if($name==$user['name'] && $password==$user['password'])
        {
            return redirect(route('home')) ;
        }
        else
        {
            return "Your username and password incorrect";
        }
    }

    function registration()
    {
        return view('pages.registration');
    }
    
    function user($name,$password)
    {
        $data=array();
    }

    function createAccount(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required| min:3',
            'email' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required| min:6|same:password',
            'dob' => 'required',
            'gender' => 'required'
        ],
        ['name.required'=>"Please put you name here",
        'name.min'=>"Name must be at least 3 characters long"],
        );
        return redirect(route('login'));
    }

    function contact()
    {
        return view('pages.contact');
    }

    function createContact(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'message' => 'required|min:10'
        ],
        ['name.required'=>"Please put you name here", 
        'message.min'=>"Message must be at least 10 characters long",
        'email.required'=>"Please put your email here",
        'phone.required'=>"Please put your phone no here"],
        );
        return redirect(route('contact'));
    }
}
