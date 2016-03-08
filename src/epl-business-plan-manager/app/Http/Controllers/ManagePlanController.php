<?php

namespace App\Http\Controllers;

use DB;
use App\Goat;
use App\BusinessPlan;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ManagePlanController extends Controller
{
    // protected $goalType;

    public function index()
    {
        // $goalType = 'Boberella';
        $businessPlans = BusinessPlan::all();

        return view('manage_plan', compact('businessPlans'));
    }

    public function show() {
        return view('create-plan');
    }

    public function store(Request $request, Goat $goat)
    {
        // if ($goalType == 'O') {
        //     return view('view_plan');
        // } else{
        //     dd(Request::all());
        // }
        $goal = new Goat;
        $goal->type = 'G';
        $goal->description = $request->goalDescription;
        $goal->priority = null;
        $goal->due_date = null;
        $goal->budget = null;
        $goal->bid = 1; // Get this from the choice box uptop left.
        $goal->save();
        // DB::table('goats');
        return back();
        // return request()->all();
    }

    public function update()
    {
        return back();
    }

    public function destroy()
    {
        return back();
    }
}
