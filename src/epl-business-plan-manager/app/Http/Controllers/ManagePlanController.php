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
        Log::info('Im in store.');
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
            return back();
        } elseif ($type == 'O') {
            $elem->type = $type;
            return back();
        } elseif ($type == 'A') {
            $elem->type = $type;
            return back();
        } else {
            $elem->type = $type;
            return back();
        }
        return back();
        $elem->save();
        return back();
    }

    public function update(Request $request)
    {
        Log::info('Im in update.');
        $elem = Goat::find($request->goalId);
        $elem->description = $request->goalDescription;
        $elem->save();
        // Log::info($elem);
        return back();
    }

    public function destroy(Request $request)
    {
        // $type = $request->type;
        Log::info('Im in destroy.');
        $elem = Goat::find($request->goalId);
        $elem->delete();
        // Log::info($elem);
        return back();
    }
}
