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
    public function index(Request $request) {
        $currentBp;
        if ($request->bp) {
            $bp = Goat::where('bid', $request->bp)->get();
        } else {
            $currentBp = BusinessPlan::where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())->first();
            if ($currentBp) {
                $bp = Goat::where('bid', $currentBp->id)->get();
            } else {
                $bp = Goat::where('bid', BusinessPlan::all()->last()->id)->get();
            }
        }
        // TODO: CACHE THIS!!

        $sorted = collect();
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
        
        return view('view_plan')->with(['bp' => $sorted, 'users' => User::all(),
            'depts' => Department::all(), 'leadOf' => $leadOf, 'plans' => BusinessPlan::orderBy('id', 'desc')->get(),
            'query' => $request, 'bp_id' => $currentBp->id]);
    }

    public function showChanges($id) {
        return view('goat_history', ['changes' => Goat::findOrFail($id)->changes()->orderBy('created_at', 'desc')->get()]);
    }

    public function createGoat($parent_id) {
        $goat = new Goat;
        $goat->parent_id = $parent_id;

        return view('goat_create', ['goat' => $goat, 'users' => User::all()]);
    }

    public function editGoat($id) {
        return view('goat_edit', ['goat' => Goat::findOrFail($id), 'users' => User::all() ]);
    }

    public function updateGoat(Request $request, $id) {
        $goat = Goat::find($id);
        if ($request->description != $goat->description) {
            $change = new \App\Change;
            $change->change_type = 'D';
            $change->description = $request->description;
            $change->goat_id = $goat->id;
            $change->user_id = Auth::user()->id;
            $change->save();
        }
        if ($request->leads) {
            $newLeads = $request->leads;
            $curLeads = $goat->userLeads()->get()->map(function($user) {
                return $user->id;
            })->toArray();
            sort($newLeads);
            sort($curLeads);

            if ($newLeads != $curLeads) {
                if ($diff = array_diff($newLeads, $curLeads)) {
                    $users = array_map(function($id) {
                        return User::findOrFail($id)->name();
                    }, $diff);
                    $change = new \App\Change;
                    $change->change_type = 'L';
                    $change->description = "Added " . join(',', $users);
                    $change->goat_id = $goat->id;
                    $change->user_id = Auth::user()->id;
                    $change->save();
                } elseif ($diff = array_diff($curLeads, $newLeads)) {
                    $users = array_map(function($id) {
                        return User::findOrFail($id)->name();
                    }, $diff);
                    $change = new \App\Change;
                    $change->change_type = 'L';
                    $change->description = "Removed " . join(',', $users);
                    $change->goat_id = $goat->id;
                    $change->user_id = Auth::user()->id;
                    $change->save();
                }
            }
        }

        if ($request->collabs) {
            $newCollaborators = $request->collabs;
            $curCollaborators = $goat->userCollaborators()->get()->map(function($user) {
                return $user->id;
            })->toArray();
            sort($newCollaborators);
            sort($curCollaborators);

            if ($newCollaborators != $curCollaborators) {
                if ($diff = array_diff($newCollaborators, $curCollaborators)) {
                    $users = array_map(function($id) {
                        return User::findOrFail($id)->name();
                    }, $diff);
                    $change = new \App\Change;
                    $change->change_type = 'C';
                    $change->description = "Added " . join(',', $users);
                    $change->goat_id = $goat->id;
                    $change->user_id = Auth::user()->id;
                    $change->save();
                } elseif ($diff = array_diff($curCollaborators, $newCollaborators)) {
                    $users = array_map(function($id) {
                        return User::findOrFail($id)->name();
                    }, $diff);
                    $change = new \App\Change;
                    $change->change_type = 'C';
                    $change->description = "Removed " . join(',', $users);
                    $change->goat_id = $goat->id;
                    $change->user_id = Auth::user()->id;
                    $change->save();
                }
            }
        }

        if ($goat->due_date != $request->due_date) {
            $change = new \App\Change;
            $change->change_type = 'T';
            $change->description = "Changed from " . \Carbon\Carbon::parse($goat->due_date)->toDateString() . " to " . \Carbon\Carbon::parse($request->due_date)->toDateString();
            $change->goat_id = $goat->id;
            $change->user_id = Auth::user()->id;
            $change->save();
        }

        if ($goat->priority != $request->priority) {
            $change = new \App\Change;
            $change->change_type = 'P';
            $change->description = "Changed from " . $this->priority_string($goat->priority) . " to " . $this->priority_string($request->priority);
            $change->goat_id = $goat->id;
            $change->user_id = Auth::user()->id;
            $change->save();
        }

        $goat->description = $request->description;
        $goat->due_date = $request->due_date;
        $goat->priority = $request->priority;
        $goat->save();

        $leads = array_fill_keys($request->leads, ['user_role' => 'L']);
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
