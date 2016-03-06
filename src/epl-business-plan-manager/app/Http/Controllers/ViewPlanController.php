<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goat;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ViewPlanController extends Controller
{
    public function index() {
    	$bp = Goat::all();
    	// for($i = 0; i < count($bp); i++) {
    		
    	// }
    	return view('view_plan')->with('bp', $bp);
    }
}
