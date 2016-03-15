<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Goat;
use App\BusinessPlan;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ManagePlanController extends Controller
{
    public function index()
    {
        $businessPlans = BusinessPlan::all();
        $goats = Goat::all();

        return view('manage_plan', compact('businessPlans', 'goats'));
    }

    public function show()
    {
        return view('create-plan');
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        $elem = new Goat;
        $type = $request->type;
        $elem->bid = $request->bId;
        if ($type == 'G') {
            $elem->type = $type;
            $elem->description = $request->goalDescription;
            $elem->priority = null;
            $elem->due_date = null;
            $elem->budget = null;
            $elem->parent_id = null;
            $elem->complete = null;
        } elseif ($type == 'O') {
            $elem->type = $type;
            $elem->description = $request->objectiveDescription;
            $elem->priority = null;
            $elem->due_date = null;
            $elem->budget = null;
            $elem->parent_id = $request->goalId;
            $elem->complete = null;
        } elseif ($type == 'A') {
            $elem->type = $type;
            $elem->description = $request->actionDescription;
            $elem->priority = $request->priority;
            $elem->due_date = $request->due;
            $elem->budget = null;
            $elem->parent_id = $request->objId;
            $elem->complete = null;
        } else {
            $elem->type = $type;
            $elem->description = $request->taskDescription;
            $elem->priority = $request->priority;
            $elem->due_date = $request->due;
            $elem->budget = null;
            $elem->parent_id = $request->actionId;
            $elem->complete = null;
        }
        $elem->save();
        return back();
    }

    public function update(Request $request)
    {
        $type = $request->type;
        if ($type == 'G') {
            $elem = Goat::find($request->goalId);
            $elem->description = $request->goalDescription;
        }elseif ($type == 'O') {
            $elem = Goat::find($request->objId);
            $elem->description = $request->objectiveDescription;
        }elseif ($type == 'A') {
            $elem = Goat::find($request->actionId);
            $elem->description = $request->actionDescription;
        }else {
            $elem = Goat::find($request->taskId);
            $elem->description = $request->taskDescription;
        }
        $elem->save();
        return back();
    }

    public function destroy(Request $request)
    {
        $type = $request->type;
        if ($type == 'G') {
            $elem = Goat::find($request->goalId);
        }elseif ($type == 'O') {
            $elem = Goat::find($request->objId);
        }elseif ($type == 'A') {
            $elem = Goat::find($request->actionId);
        }else {
            $elem = Goat::find($request->taskId);
        }
        $elem->delete();
        return back();
    }
}
