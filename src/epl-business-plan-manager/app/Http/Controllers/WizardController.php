<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BusinessPlanController extends Controller
{
    public function create() {
    	return view('business_plan_wizard');
    }
}
