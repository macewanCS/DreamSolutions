<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function dashboard(){
    	return view('main_header');
    }
}
