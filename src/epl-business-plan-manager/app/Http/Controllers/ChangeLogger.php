<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Goat;
use Illuminate\Http\Request;

trait ChangeLogger {

    public function createNewGoatChange(Goat $goat) {
        $change = new \App\Change;
        $change->change_type = 'G';
        $change->description = ($goat->type == 'G' ? 'Goal' :
                               ($goat->type == 'O' ? 'Objective' :
                               ($goat->type == 'A' ? 'Action' :
                                'Task'))). " created";
        $change->goat_id = $goat->id;
        $change->user_id = Auth::user()->id;
        $change->save();
    }

    public function createChanges(Goat $goat, $department_id, $description, $success_measure, $leads, $collabs, $due_date, $priority) {

        if ($department_id != $goat->department_id) {
            $change = new \App\Change;
            $change->change_type = 'L';
            $change->description = 'Assigned to ' . Department::find($department_id)->name;
            $change->goat_id = $goat->id;
            $change->user_id = Auth::user()->id;
            $change->save();
        }

        if ($description != $goat->description) {
            $change = new \App\Change;
            $change->change_type = 'D';
            $change->description = $description;
            $change->goat_id = $goat->id;
            $change->user_id = Auth::user()->id;
            $change->save();
        }

        if ($success_measure != $goat->success_measure) {
            $change = new \App\Change;
            $change->change_type = 'M';
            $change->description = "Success Measure: ".$success_measure;
            $change->goat_id = $goat->id;
            $change->user_id = Auth::user()->id;
            $change->save();
        }

        if ($leads) {
            $newLeads = $leads;
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
                } 
                if ($diff = array_diff($curLeads, $newLeads)) {
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

        if ($collabs) {
            $newCollaborators = $collabs;
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
                }

                if ($diff = array_diff($curCollaborators, $newCollaborators)) {
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

        if ($goat->due_date != $due_date) {
            $change = new \App\Change;
            $change->change_type = 'T';
            $change->description = "Changed from " . \Carbon\Carbon::parse($goat->due_date)->toDateString() . " to " . \Carbon\Carbon::parse($due_date)->toDateString();
            $change->goat_id = $goat->id;
            $change->user_id = Auth::user()->id;
            $change->save();
        }

        if ($goat->priority != $priority) {
            $change = new \App\Change;
            $change->change_type = 'P';
            $change->description = "Changed from " . $this->priority_string($goat->priority) . " to " . $this->priority_string($priority);
            $change->goat_id = $goat->id;
            $change->user_id = Auth::user()->id;
            $change->save();
        }

    }
}