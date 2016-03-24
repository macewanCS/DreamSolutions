<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use App\Goat;
use File;

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
        // $recent = Change::where('goat_id', $id)->get();
        $tasks = $user->collaboratorOn()->orderBy('due_date')->get();
        $dept = $user->departments()->get();
        
    	return view('dashboard', compact('user', 'tasks', 'dept', 'pic'));
    }

    public function dashboard2()
    {
        $user = Auth::user();   
        $tasks = $user->collaboratorOn()->orderBy('due_date')->get();
        $dept = $user->departments()->get();
        if (File::exists('images/user_pics/' . $user->username . '.jpg')){
            $pic = $user->username;
        }
        else{
            $pic = 'empty-profile';
        }
        // dd($pic);
        return view('dashboard2', compact('user', 'tasks', 'dept', 'pic'));
    }
}