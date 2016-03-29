<?php

namespace App\Http\Controllers;

use App\BusinessPlan;
use App\Department;
use App\Goat;
use Carbon\Carbon;
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

        $newBusinessPlan = new BusinessPlan();
        $newBusinessPlan->start = date($request['sYear'].'-01-01 00:00:00');
        $newBusinessPlan->end = date($request['eYear'].'-12-31 00:00:00');
        $newBusinessPlan->save();

        foreach (array_keys($request['data']) as $idx) {

            $key = array_keys($request['data'][$idx])[0];

            $newGoal = new Goat();
            $newGoal->type = 'G';
            $newGoal->parent_id = null;
            $newGoal->description = $key;
            $newGoal->priority = 0;
            $newGoal->complete = false;
            $newGoal->goal_type = 'B';
            $newGoal->due_date = null;
            $newGoal->budget = 0;
            $newGoal->created_at = Carbon::now();
            $newGoal->updated_at = Carbon::now();
            $newGoal->bid = $newBusinessPlan->id;
            $newGoal->save();

            foreach ($request['data'][$idx][$key] as $obj) {
                $newObj = new Goat();
                $newObj->type = 'O';
                $newObj->parent_id = $newGoal->id;
                $newObj->description = $obj;
                $newObj->priority = 0;
                $newObj->complete = false;
                $newObj->goal_type = 'B';
                $newObj->due_date = null;
                $newObj->budget = 0;
                $newObj->created_at = Carbon::now();
                $newObj->updated_at = Carbon::now();
                $newObj->bid = $newBusinessPlan->id;
                $newObj->save();
            }
        }

        foreach (Department::lists('name') as $dept_name) {
            $newGoal = new Goat();
            $newGoal->type = 'G';
            $newGoal->parent_id = null;
            $newGoal->description = $dept_name." Goals";
            $newGoal->priority = 0;
            $newGoal->complete = false;
            $newGoal->goal_type = 'D';
            $newGoal->due_date = null;
            $newGoal->budget = 0;
            $newGoal->created_at = Carbon::now();
            $newGoal->updated_at = Carbon::now();
            $newGoal->bid = $newBusinessPlan->id;
            $newGoal->save();
        }

        return response()->json([], 200);
    }

}
