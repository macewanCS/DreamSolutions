<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use App\Goat;
use App\Change;
use File;
use Carbon;
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
        $tasks = $user->goats()->orderBy('due_date')->get();
        $dept = $user->departments()->get();
        $recentEmpty = true;
        $tasksEmpty = true;


        foreach($tasks as $task){
            if (!$task->complete){
                $tasksEmpty = false;
            }
        //     if (Carbon\Carbon::parse($task->due_date)->diff(Carbon\Carbon::now())){
        //         $task->soon = 'red';
        //     }
        //     else{
        //         $task->soon = '';
        //     }
        }//redo controller


        $inProgress = $tasks->where('complete', '0')->count();
        $complete = $tasks->where('complete', '1')->count();
        $overdue = 0;
        foreach($tasks as $task){
            if (Carbon\Carbon::parse($task->due_date)->lt(Carbon\Carbon::now())){
                $overdue++;
            }
        }

        foreach ($recent as $task){
            $recentEmpty = false;
            $task->task = Goat::where('id', $task->goat_id)->value('description');
        }

    	return view('dashboard', compact('user', 'tasks', 'dept', 'recent', 'recentEmpty', 'tasksEmpty', 'complete', 'inProgress', 'overdue'));
    }


}
