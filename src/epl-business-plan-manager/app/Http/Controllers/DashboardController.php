<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use App\Goat;

use View;
use Auth;
//use User;
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
        $tasks = $user->collaboratorOn()->orderBy('description')->get();
        // dd($tasks);
        
    	return view('dashboard', compact('user', 'tasks'));
    }
}