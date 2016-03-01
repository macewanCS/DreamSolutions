<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ManagePlanController extends Controller
{

    public function index()
    {
        return view('manage_plan');
    }

    public function store()
    {
        // Model::create() something
        return redirect('manage_plan');
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
