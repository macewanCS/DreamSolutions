<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use View;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function __contruct(){
        $this->middleware('auth');
    }

    public function dashboard(){

    	return view('dashboard');
    }

    public function login(){

    	$username = Request::get('username');
    	$password = Request::get('password');

    	$user = User::where('username', '=', $username)->first();

        
    	if (is_null($user)){
    		return view('bad_up');
    	}

    	$pass = $user->password;
    	$fname = $user->first_name;
    	$lname = $user->last_name;

    	
		if (is_null($user) || is_null($pass) || $pass != $password){
    		return view('bad_up');
    	}

    	return view('dashboard', compact('fname', 'lname'));
    }

}
