<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use View;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();	
    	return view('dashboard', compact('user'));
    }

}