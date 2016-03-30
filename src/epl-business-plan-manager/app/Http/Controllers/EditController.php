<?php

namespace App\Http\Controllers;

use App\Change;
use App\Goat;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class EditController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function show($id){
        
        // $task = Change::user();//where('goat_id', intval($id))->get();
        $changes = Change::where('goat_id', $id)->get();
        $task = Goat::where('id', $id)->first();
        $leads = $task->userLeads()->get();
        // dd($task);

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

        $empty = true;
        foreach($changes as $change){
            $empty = false;
            $change->fname = User::where('id', $change->user_id)->value('first_name');
            $change->lname = User::where('id', $change->user_id)->value('last_name');
        }

        
        $leads = join(", ", $leadsArray);
        $collabs = join(", ", $collabsArray);
        
        $priority = array("High", "Medium", "Low");


    	$fields = array(
    		array('Action', $task->description),
    		array('Due Date', $task->due_date),
    		array('Lead', $leads),
    		array('Collaborators', $collabs),
    		array('Status', 'In Progress'),
    		array('Priority', $priority[$task->priority - 1])
    	);
    	
    	return view('edit', compact('fields', 'changes', 'needsResize', 'empty', 'task'));
    }

    public function create(Request $req){

        $user = Auth::user();
        $change = new Change;
      
        if ($req->option === 'Status'){
            $changeType = 'S';
        }
        else{
            $changeType = 'N';
        }
        if ($req->complete){
            Goat::where('id', $req->id)->update(['complete' =>'1']);
        }
        else{
            Goat::where('id', $req->id)->update(['complete' => false]);
        }

        if ($req->statusUpdate === '' && $req->complete){
            $req->statusUpdate = 'Complete';
        }

        $change = Change::create([
            'change_type' => $changeType,
            'description' => $req->statusUpdate,
            'goat_id' => $req->id,
            'user_id' => $user->id
            ]);

        return redirect('dashboard');
    }

}

