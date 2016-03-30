<?php

use App\Goat;
use App\User;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Manage Plan controller routes
// Route::get('/manage', 'ManagePlanController@index'); // Depricated.
// Route::post('/manage', 'ManagePlanController@store');
// Route::patch('/manage', 'ManagePlanController@update');
// Route::delete('/manage', 'ManagePlanController@destroy');
Route::get('/ajax-goal', function () {
    $b_Id = Input::get('b_Id');
    $goals = Goat::where('bid', '=', $b_Id)->where('type', '=', 'G')->get();
    return Response::json($goals);
});
Route::get('ajax-objective', function () {
    $goal_Id = Input::get('goal_Id');
    $objectives = Goat::where('parent_id', '=', $goal_Id)->where('type', '=', 'O')->get();
    return Response::json($objectives);
});
Route::get('ajax-action', function () {
    $obj_Id = Input::get('obj_Id');
    $actions = Goat::where('parent_id', '=', $obj_Id)->where('type', '=', 'A')->get();
    return Response::json($actions);
});
Route::get('ajax-task', function () {
    $action_Id = Input::get('action_Id');
    $tasks = Goat::where('parent_id', '=', $action_Id)->where('type', '=', 'T')->get();
    return Response::json($tasks);
});
Route::get('ajax-actionData', function () {
    $actionId = Input::get('action_Id');
    $data = Goat::where('id', '=', $actionId)->where('type', '=', 'A')->get();
    return Response::json($data);
});
Route::get('ajax-taskData', function () {
    $taskId = Input::get('task_Id');
    $data = Goat::where('id', '=', $taskId)->where('type', '=', 'T')->get();
    return Response::json($data);
});
Route::get('ajax-Leads', function () {
    $actionId = Input::get('goat_Id');
    $leads = Goat::where('id', '=', $actionId)->first()->userLeads;
    $names = $leads->map(function ($lead) {
        return $lead->name();
    });
    return Response::json($names);
});
Route::get('ajax-Collabs', function () {
    $actionId = Input::get('goat_Id');
    $collabs = Goat::where('id', '=', $actionId)->first()->userCollaborators;
    $names = $collabs->map(function ($collab) {
        return $collab->name();
    });
    return Response::json($names);
});
Route::get('ajax-goat_lUsers', function () {
    $actionId = Input::get('goat_Id');
    $data = Goat::where('id', '=', $actionId)->first()->userLeads;
    Log::info($data);
    return Response::json($data);
});
Route::get('ajax-goat_cUsers', function () {
    $actionId = Input::get('goat_Id');
    $data = Goat::where('id', '=', $actionId)->first()->userCollaborators;
    Log::info($data);
    return Response::json($data);
});

// Create business controller routes
// Route::get('/manage/create-plan', 'CreatePlanController@show');
// Route::post('/manage/create-plan', 'CreatePlanController@create');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    /* Login controllers */
    Route::get('/login', 'Auth\AuthController@getLogin');
    Route::get('/', function () {
        return redirect('/login');
    });

    Route::auth();
    Route::get('/dashboard', 'DashboardController@dashboard');

    // View plan controller routes
    Route::get('/view', 'ViewPlanController@index');
    Route::get('/view/{id}', 'ViewPlanController@showChanges');
    Route::get('/view/{id}/edit', 'ViewPlanController@editGoat');
    Route::patch('/view/{id}/edit', 'ViewPlanController@updateGoat');

    Route::get('/changes', 'ChangelogController@index');

    Route::resource('/admin/users', 'UserController');
    Route::resource('/admin/depts', 'DepartmentController');

    Route::get('/manage/create-plan', 'CreatePlanController@show');
    Route::post('/manage/create-plan', 'CreatePlanController@create');

    Route::get('/edit/{id}', 'EditController@show');
    Route::post('edit/{id}', 'EditController@create');

    // Manage Plan controller routes
    Route::get('/manage', 'ManagePlanController@index');
    Route::post('/manage', 'ManagePlanController@store');
    Route::patch('/manage', 'ManagePlanController@update');
    Route::delete('/manage', 'ManagePlanController@destroy');
});
