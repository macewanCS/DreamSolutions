<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WizardController extends Controller
{
    public function showIndex() {
        return view('wizard.index');
    }

    public function createBP() {
        return redirect('wizard/goals');
    }

    public function goalsToIndex() {
        return redirect('wizard');
    }

    public function showGoals() {
        return view('wizard.goals');
    }

    public function createGoals() {
        return redirect('wizard/objectives');
    }

    public function objectivesToGoal() {
        return redirect('wizard/goals');
    }

    public function showObjectives() {
        return view('wizard.objectives');
    }

    public function createObjectives() {
        return redirect('wizard/actions');
    }

    public function actionsToObjectives() {
        return redirect('wizard/objectives');
    }

    public function showActions() {
        return view('wizard.actions');
    }

    public function createActions() {
        return redirect('manage');
    }

}
