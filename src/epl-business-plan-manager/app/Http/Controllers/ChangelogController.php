<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Change;
use App\Http\Requests;

class ChangelogController extends Controller
{
    public function index(Request $request) {
        $query = $request->input();
        $changes = Change::select('*');

        if ($request->input('user')) {
            $changes = $changes->where('user_id', $request->input('user'));
        }

        if ($request->input('start')) {
            $changes = $changes->where('changes.created_at', '>=', $request->input('start'));
        }

        if ($request->input('end')) {
            $changes = $changes->where('changes.created_at', '<=', $request->input('end'));
        }

        if ($request->input('goat')) {
            $changes = $changes->where('goat_id', $request->input('goat'));
        }

        if ($request->input('type')) {
            $changes = $changes->where('change_type', $request->input('type'));
        }

        $changes = $changes->join('goats', 'goats.id', '=', 'changes.goat_id')
                           ->select('changes.description as description', 
                                    'changes.created_at as created_at',
                                    'changes.change_type as change_type',
                                    'changes.user_id as user_id',
                                    'changes.goat_id as goat_id');

        if ($request->input('dept')) {
            $changes = $changes->where('department_id', $request->input('dept'));
        }

        return view('changelog')->with(['changes' => $changes->orderBy('created_at', 'desc')->paginate(20),
                                         'users' => \App\User::all(),
                                         'depts' => \App\Department::all(),
                                         'query' => $query]);
    }
}