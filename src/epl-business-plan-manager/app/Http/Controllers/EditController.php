<?php

namespace App\Http\Controllers;

use App\Change;
use App\Goat;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class EditController extends Controller
{

    // public function __construct() 
    // {
    //     $this->middleware('auth');
    // }

    public function show($id){
        
        // $task = Change::user();//where('goat_id', intval($id))->get();
        $changes = Change::where('goat_id', $id)->get();
        $task = Goat::where('id', $id)->first();
        $leads = $task->userLeads()->get();

        $collabs = $task->userCollaborators()->get();
        $leadsArray = array();
        $collabsArray = array();
        foreach($leads as $lead){
            array_push($leadsArray, join(" ", array($lead->first_name, $lead->last_name)));
        }
        foreach($collabs as $collab){
            array_push($collabsArray, join(" ", array($collab->first_name, $collab->last_name)));
        }

        $needsResize = false;
        if (sizeof($changes) > 4){
            $needsResize = true;
        }

        // dd($leadsArray);
        $leads = join(",", $leadsArray);
        $collabs = join(",", $collabsArray);
        
        $priority = array("High", "Medium", "Low");


    	$fields = array(
    		array('Action', $task->description),
    		array('Due Date', $task->due_date),
    		array('Lead', $leads),
    		array('Collaborators', $collabs),
    		array('Status', 'In Progress'),
    		array('Priority', $priority[$task->priority])
    	);
    	
    	return view('edit', compact('fields', 'changes', 'needsResize'));
    }

    public function create(Request $req){

        $user = Auth::user();
        $change = new Change;
        $change->goat_id = $req->id;
        $change->user_id = 1;
        $change->description = $req->statusUpdate;

        $change = Change::create([
            'change_type' => 'S',
            'description' => $req->statusUpdate,
            'goat_id' => $req->id,
            'user_id' => 1
            ]);

        return redirect('dashboard');
    }

}

