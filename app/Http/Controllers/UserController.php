<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function get_profile(){

        if(auth()->user()){
            return view('components.profile');
        }else{
            return view('components.error-404');
        }
    }
}
