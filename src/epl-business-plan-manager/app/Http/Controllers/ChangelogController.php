<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Change;
use App\Http\Requests;

class ChangelogController extends Controller
{
    public function index(Request $request) {
        $changes = Change::select('*');

        if ($request->input('user')) {
            $changes = $changes->where('user_id', $request->input('user'));
        }

        if ($request->input('start')) {
            $changes = $changes->where('created_at', '>=', $request->input('start'));
        }

        if ($request->input('end')) {
            $changes = $changes->where('created_at', '<=', $request->input('end'));
        }

        if ($request->input('goat')) {
            $changes = $changes->where('goat_id', $request->input('goat'));
        }

        if ($request->input('dept')) {
            //
        }

        return view('changelog')->with(['changes' => $changes->paginate(20)]);
    }
}