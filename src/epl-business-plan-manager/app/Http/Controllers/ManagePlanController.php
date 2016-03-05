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
        return back();
    }

    public function update()
    {
        return back();
    }

    public function destroy()
    {
        return back();
    }
}
