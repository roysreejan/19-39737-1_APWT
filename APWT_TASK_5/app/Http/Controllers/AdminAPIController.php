<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\AdminController;

class AdminAPIController extends Controller
{
    //
    public function APIlist(){
        return Users::all();
    }
    public function APIpost(Request $request){
        
        $user = new Users();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();

        return $request;
    }
}
