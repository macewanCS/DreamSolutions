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
Route::get('/manage', 'ManagePlanController@index');
Route::post('/manage', 'ManagePlanController@store');
Route::patch('/manage', 'ManagePlanController@update');
Route::delete('/manage', 'ManagePlanController@destroy');
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
Route::get('ajax-actionPriority', function () {
    $actionId = Input::get('action_Id');
    $priority = Goat::where('id', '=', $actionId)->where('type', '=', 'A')->get();
    return Response::json($priority);
});
Route::get('ajax-taskPriority', function () {
    $taskId = Input::get('task_Id');
    $priority = Goat::where('id', '=', $taskId)->where('type', '=', 'T')->get();
    return Response::json($priority);
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

    Route::resource('/admin/users', 'UserController');

    Route::get('/manage/create-plan', 'CreatePlanController@show');
    Route::post('/manage/create-plan', 'CreatePlanController@create');

    Route::get('/edit/{id}', 'EditController@show');
    Route::post('edit/{id}', 'EditController@create');
});
