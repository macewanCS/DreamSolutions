<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreatePlanController extends Controller
{
    public function showYears() {
        return view('create-plan.years');
    }

    public function createBP() {
        return redirect('manage/create-plan/goals');
    }

    public function goalsToYears() {
        return redirect('manage/create-plan');
    }

    public function showGoals() {
        return view('create-plan.goals');
    }

    public function createGoals() {
        return redirect('manage/create-plan/objectives');
    }

    public function objectivesToGoal() {
        return redirect('manage/create-plan/goals');
    }

    public function showObjectives() {
        return view('create-plan.objectives');
    }

    public function createObjectives() {
        return redirect('manage/create-plan/actions');
    }

    public function actionsToObjectives() {
        return redirect('manage/create-plan/objectives');
    }

    public function showActions() {
        return view('create-plan.actions');
    }

    public function createActions() {
        return redirect('manage');
    }

}
