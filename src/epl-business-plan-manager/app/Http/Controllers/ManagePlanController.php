<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Goat;
use App\User;
use App\BusinessPlan;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ManagePlanController extends Controller
{

    // public function __construct()
    //    {
    //        $this->middleware('auth');
    //    }

    public function index()
    {
        $businessPlans = BusinessPlan::all();
        $goats = Goat::all();
        $users = User::all();

        return view('manage_plan', compact('businessPlans', 'goats', 'users'));
    }

    public function show()
    {
        return view('create-plan');
    }

    public function store(Request $request)
    {
        $elem = new Goat;
        $type = $request->type;
        $elem->bid = $request->bId;
        if ($type == 'G') {
            $this->validate($request, [
            'bId' => 'required',
            'goalDescription' => 'required|min:10|max:300'
            ]);
            if (Input::get('businessItem') === 'B') {
                $elem->goal_type = 'B';
            } else {
                $elem->goal_type = 'D';
            }
            $elem->type = $type;
            $elem->description = $request->goalDescription;
            $elem->priority = null;
            $elem->due_date = null;
            $elem->budget = null;
            $elem->parent_id = null;
            $elem->complete = null;
            $elem->save();
        } elseif ($type == 'O') {
            $this->validate($request, [
            'bId' => 'required',
            'goalId' => 'required',
            'objectiveDescription' => 'required|min:10|max:300'
            ]);
            $elem->type = $type;
            $elem->goal_type = 'B';
            $elem->description = $request->objectiveDescription;
            $elem->priority = null;
            $elem->due_date = null;
            $elem->budget = null;
            $elem->parent_id = $request->goalId;
            $elem->complete = null;
            $elem->save();
        } elseif ($type == 'A') {
            $this->validate($request, [
            'bId' => 'required',
            'goalId' => 'required',
            'objId' => 'required',
            'actionDescription' => 'required|min:10|max:300',
            'end' => 'required|date|after:today'
            ]);
            $elem->type = $type;
            $elem->goal_type = 'B';
            $elem->description = $request->actionDescription;
            $elem->priority = $request->priority;
            $elem->due_date = $request->end;
            $elem->budget = null;
            $elem->parent_id = $request->objId;
            $elem->complete = null;
            $elem->save();
            if ($request->leadName === null && $request->collaboratorName === null) {
                return back();
            } elseif ($request->leadName === null) {
                $collabs = array_fill_keys($request->collaboratorName, ['user_role' => 'C']);
                $elem->userLeads()->sync($collabs);
            } elseif ($request->collaboratorName === null) {
                $leads = array_fill_keys($request->leadName, ['user_role' => 'L']);
                $elem->userLeads()->sync($leads);
            } else {
                $leads = array_fill_keys($request->leadName, ['user_role' => 'L']);
                $collabs = array_fill_keys($request->collaboratorName, ['user_role' => 'C']);
                $elem->userLeads()->sync($leads + $collabs);
            }
        } else {
            $this->validate($request, [
            'bId' => 'required',
            'goalId' => 'required',
            'objId' => 'required',
            'actionId' => 'required',
            'taskDescription' => 'required|min:10|max:300',
            'end' => 'required|date|after:today'
            ]);
            $elem->type = $type;
            $elem->goal_type = 'B';
            $elem->description = $request->taskDescription;
            $elem->priority = $request->priority;
            $elem->due_date = $request->end;
            $elem->budget = null;
            $elem->parent_id = $request->actionId;
            $elem->complete = null;
            $elem->save();
            if ($request->leadName === null && $request->collaboratorName === null) {
                return back();
            } elseif ($request->leadName === null) {
                $collabs = array_fill_keys($request->collaboratorName, ['user_role' => 'C']);
                $elem->userLeads()->sync($collabs);
            } elseif ($request->collaboratorName === null) {
                $leads = array_fill_keys($request->leadName, ['user_role' => 'L']);
                $elem->userLeads()->sync($leads);
            } else {
                $leads = array_fill_keys($request->leadName, ['user_role' => 'L']);
                $collabs = array_fill_keys($request->collaboratorName, ['user_role' => 'C']);
                $elem->userLeads()->sync($leads + $collabs);
            }
        }
        return back();
    }

    public function update(Request $request)
    {
        $type = $request->type;
        if ($type == 'G') {
            $this->validate($request, [
            'bId' => 'required',
            'goalId' => 'required',
            'goalDescription' => 'required|min:10|max:300'
            ]);
            $elem = Goat::find($request->goalId);
            $elem->description = $request->goalDescription;
        } elseif ($type == 'O') {
            $this->validate($request, [
            'bId' => 'required',
            'goalId' => 'required',
            'objId' => 'required',
            'objectiveDescription' => 'required|min:10|max:300'
            ]);
            $elem = Goat::find($request->objId);
            $elem->description = $request->objectiveDescription;
        } elseif ($type == 'A') {
            $this->validate($request, [
            'bId' => 'required',
            'goalId' => 'required',
            'objId' => 'required',
            'actionId' => 'required',
            'actionDescription' => 'required|min:10|max:300',
            'end' => 'required|date|after:today'
            ]);
            $elem = Goat::find($request->actionId);
            $elem->description = $request->actionDescription;
            $elem->priority = $request->priority;
            $elem->due_date = $request->end;
        } else {
            $this->validate($request, [
            'bId' => 'required',
            'goalId' => 'required',
            'objId' => 'required',
            'actionId' => 'required',
            'taskId' => 'required',
            'taskDescription' => 'required|min:10|max:300',
            'end' => 'required|date|after:today'
            ]);
            $elem = Goat::find($request->taskId);
            $elem->description = $request->taskDescription;
            $elem->priority = $request->priority;
            $elem->due_date = $request->end;
        }
        if ($request->leadName === null && $request->collaboratorName === null) {
            $leads = array_fill_keys([], ['user_role' => 'L']);
            $elem->userLeads()->sync($leads);
            $collabs = array_fill_keys([], ['user_role' => 'C']);
            $elem->userLeads()->sync($collabs);
            return back();
        } elseif ($request->leadName === null) {
            $leads = array_fill_keys([], ['user_role' => 'L']);
            $elem->userLeads()->sync($leads);
            $collabs = array_fill_keys($request->collaboratorName, ['user_role' => 'C']);
            $elem->userLeads()->sync($collabs);
        } elseif ($request->collaboratorName === null) {
            $collabs = array_fill_keys([], ['user_role' => 'C']);
            $elem->userLeads()->sync($collabs);
            $leads = array_fill_keys($request->leadName, ['user_role' => 'L']);
            $elem->userLeads()->sync($leads);
        } else {
            $leads = array_fill_keys($request->leadName, ['user_role' => 'L']);
            $collabs = array_fill_keys($request->collaboratorName, ['user_role' => 'C']);
            $elem->userLeads()->sync($leads + $collabs);
        }
        $elem->save();
        return back();
    }

    public function destroy(Request $request)
    {
        $type = $request->type;
        if ($type == 'G') {
            $this->validate($request, [
                'bId' => 'required',
                'goalId' => 'required'
            ]);
            $elem = Goat::find($request->goalId);
        } elseif ($type == 'O') {
            $this->validate($request, [
                'bId' => 'required',
                'goalId' => 'required',
                'objId' => 'required'
            ]);
            $elem = Goat::find($request->objId);
        } elseif ($type == 'A') {
            $this->validate($request, [
                'bId' => 'required',
                'goalId' => 'required',
                'objId' => 'required',
                'actionId' => 'required'
            ]);
            $elem = Goat::find($request->actionId);
        } else {
            $this->validate($request, [
                'bId' => 'required',
                'goalId' => 'required',
                'objId' => 'required',
                'actionId' => 'required',
                'taskId' => 'required'
            ]);
            $elem = Goat::find($request->taskId);
        }
        // Not certain if this for loop does what its supposed to => logging and testing required.
        $users = $elem->userLeads();
        foreach ($users as $user) {
            $user->delete();
        }
        $users = $elem->userCollaborators();
        foreach ($users as $user) {
            $user->delete();
        }
        return back(); // Tmp
        $elem->delete();
        return back();
    }
}
