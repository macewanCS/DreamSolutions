<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Department;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagesize = 3;
        $query = $request->input();
        //unset($query['page']);

        $users = $request->input("dept") ?
                    Department::find($request->input("dept"))->users() :
                    User::orderBy('id');

        switch($request->input("sort")) {
            case "username":
                $users = $users->orderBy('username')->paginate($pagesize);
                break;
            case "name":
                $users = $users->orderBy('first_name')->paginate($pagesize);
                break;
            case "dept":
                break;
            case "status":
                // TODO: active/inactive
                break;
            default:
                $users = $users->paginate($pagesize);
        }

        $depts = Department::all();

        return view('admin', ['users' => $users, 'query' => $query, 'depts' => $depts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
