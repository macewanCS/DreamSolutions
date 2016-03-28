<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use App\Goat;
use App\Change;
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
        $recent = Change::where('user_id', $user->id)->get();
        $tasks = $user->collaboratorOn()->orderBy('due_date')->get();
        $dept = $user->departments()->get();
        $recentEmpty = true;
        $tasksEmpty = true;

        foreach($tasks as $task){
            if (!$task->complete){
                $tasksEmpty = false;
            }
        }


        foreach ($recent as $task){
            $recentEmpty = false;
            $task->task = Goat::where('id', $task->goat_id)->value('description');
            // $task->due_date = Goat::where('id', $task->goat_id)->value('due_date');
        }
        
    	return view('dashboard', compact('user', 'tasks', 'dept', 'recent', 'recentEmpty', 'tasksEmpty'));
    }

   
}