<?php

namespace App\Http\Controllers;

use App\Change;
use Illuminate\Http\Request;
use App\Http\Requests;

class EditController extends Controller
{
    public function show($id){

        
        // $task = Change::user();//where('goat_id', intval($id))->get();
        $task = Change::find(2)->where('goat_id', $id);
        dd($task);
    	$fields = array(
    		array('Action','Establish a fine-free day to take place every second year'),
    		array('Date', '2014 - 2016'),
    		array('Lead', 'Jody Crilly'),
    		array('Collaborators', 'Marketing'),
    		array('Status', 'In Progress'),
    		array('Priority', 'High')
    	);
    	
    	return view('edit', compact('fields'));
    }
}
