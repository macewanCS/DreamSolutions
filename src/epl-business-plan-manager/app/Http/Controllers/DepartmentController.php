<?php

namespace App\Http\Controllers;

use App\BusinessPlan;
use App\Goat;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Department;
use App\Http\Requests;

class DepartmentController extends Controller
{
    public function __construct() 
    {
        $this->middleware('App\Http\Middleware\RedirectIfNotAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagesize = 5;

        $depts = Department::paginate($pagesize);

        return view('admin.departments', ['depts' => $depts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Department::create($request->input());

        foreach (BusinessPlan::lists('id') as $bid) {
            $newGoal = new Goat();
            $newGoal->type = 'G';
            $newGoal->parent_id = null;
            $newGoal->description = $request['name']." Goals";
            $newGoal->priority = 0;
            $newGoal->complete = false;
            $newGoal->goal_type = 'D';
            $newGoal->due_date = null;
            $newGoal->budget = 0;
            $newGoal->created_at = Carbon::now();
            $newGoal->updated_at = Carbon::now();
            $newGoal->bid = $bid;
            $newGoal->save();
        }

        return redirect('admin/depts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.department_edit', ['dept' => Department::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dept = Department::find($id);
        $dept->fill($request->input())->save();

        return redirect('admin/depts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
