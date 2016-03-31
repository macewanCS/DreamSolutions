<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Goat;
use App\Department;
use App\BusinessPlan;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ViewPlanController extends Controller
{
    use ChangeLogger;

    public function index(Request $request) {

        if ($request->bp) {
            $currentBp = BusinessPlan::find($request->bp);
        } else {
            $currentBp = BusinessPlan::where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())->first();
            if (!$currentBp) {
                $currentBp = BusinessPlan::all()->last();
            }
        }

        $sorted = Goat::where('bid', $currentBp->id)->where('type', 'G')->orderBy('goal_type')->orderBy('description')->get();
        $bp = Goat::where('bid', $currentBp->id)->where('type', '<>', 'G')->orderByRaw("FIELD(type, 'O', 'A', 'T')")->orderBy('description', 'desc')->get();

        foreach ($bp as $goat) {
            if ($goat->type === 'G') {
                $sorted->push($goat);
                continue;
            }

            for ($i = 0, $len = $sorted->count(); $i < $len; $i++) {
                if ($sorted[$i]->id == $goat->parent_id) {
                    // Hacky fix since when you splice $goat into $sorted, 
                    // it converts the $goat into an array instead of 
                    // keeping it as a Model object...
                    $sorted->splice($i + 1, 0, "temp");
                    $sorted->put($i + 1, $goat);
                    break;
                }
            }
        }

        $leadOf = array();

        if (Auth::user()) {
            foreach (Auth::user()->leadOf as $dept) {
                array_push($leadOf, $dept->id);
            }
        }

        $collaboratorGoals = array();
        foreach ($leadOf as $dept_id) {
            foreach (Department::find($dept_id)->collaboratorOn as $goat) {
                array_push($collaboratorGoals, $goat->id);
            }
        }

        return view('view_plan')->with([
                'bp' => $sorted,
                'users' => User::all(),
                'depts' => Department::all(),
                'leadOf' => $leadOf,
                'plans' => BusinessPlan::orderBy('id', 'desc')->get(),
                'query' => $request, 'bp_id' => $currentBp->id,
                'is_bplead' => Auth::user() && Auth::user()->is_bplead,
                'collaboratorGoals' => $collaboratorGoals
        ]);
    }

    public function showChanges($id) {
        return view('goat_history', ['changes' => Goat::findOrFail($id)->changes()->orderBy('created_at', 'desc')->get()]);
    }

    public function createGoat($parent_id) {
        $goat = new Goat;
        $goat->parent_id = $parent_id;
        $goat->type = $goat->parent->type == 'G' ? 'O' :
                      $goat->parent->type == 'O' ? 'A' :
                      'T';
        $goat->priority = 2;

        return view('goat_create', ['goat' => $goat, 'users' => User::all(), 'parentId' => $parent_id]);
    }

    public function storeGoat(Request $request, $parent_id)
    {
        $goat = new Goat;

        $goat->parent_id = $parent_id;
        $goat->type = $goat->parent->type == 'G' ? 'O' :
                      $goat->parent->type == 'O' ? 'A' :
                      'T';
        $goat->goal_type = $goat->parent->goal_type;
        $goat->bid = $goat->parent->bid;
        $goat->department_id = Auth::user()->leadOf()->first()->id;
        $goat->budget = null;

        $goat->description = $request->description;
        $goat->due_date = $request->due_date;
        $goat->priority = $request->priority;
        $goat->save();

        $leads = array_fill_keys(($request->leads ? $request->leads : array()), ['user_role' => 'L']);
        $collabs = array_fill_keys(($request->collabs ? $request->collabs : array()), ['user_role' => 'C']);
        $goat->userLeads()->sync($leads + $collabs);

        $this->createNewGoatChange($goat);

        return redirect('/view');
    }

    public function editGoat($id) {
        return view('goat_edit', ['goat' => Goat::findOrFail($id), 'users' => User::all() ]);
    }

    public function updateGoat(Request $request, $id) {
        $goat = Goat::find($id);

        $this->createChanges($goat, $request);

        $goat->description = $request->description;
        $goat->success_measure = $request->success_measure;
        $goat->due_date = $request->due_date;
        $goat->priority = $request->priority;
        $goat->department_id = $request->department;
        $goat->save();

        $leads = array_fill_keys(($request->leads ? $request->leads : array()), ['user_role' => 'L']);
        $collabs = array_fill_keys(($request->collabs ? $request->collabs : array()), ['user_role' => 'C']);
        $goat->userLeads()->sync($leads + $collabs);

        return redirect('/view');
    }

    private function priority_string($num) {
        switch ($num) {
            case 1:
                return "high";
            case 2:
                return "medium";
            case 3:
                return "low";
        }
    }
}
