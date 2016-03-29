<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CreatePlanController extends Controller
{

	public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function show() {
        return view('create-plan');
    }

    public function create(Request $request) {
        dd("HELLO");

        return redirect('manage');
    }

}
