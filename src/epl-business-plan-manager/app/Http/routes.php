<?php

use App\Goat;

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
Route::patch('/manage','ManagePlanController@update');
Route::delete('/manage', 'ManagePlanController@destroy');
Route::get('/ajax-goal', function(){
	Log::info('Im in route ajax-goal.');
	$b_Id = Input::get('b_Id');
	Log::info('This is b_Id: ' . $b_Id);

	$goals = Goat::where('bid', '=', $b_Id)->get();

	return Response::json($goals);
});
Route::get('ajax-objective', function(){
	$goal_Id = Input::get('goal_Id');

	$objectives = Goat::where('parent_id', '=', $goal_Id)->get();

	return Response::json($objectives);
});
Route::get('ajax-action', function(){
	$obj_Id = Input::get('obj_Id');

	$actions = Goat::where('parent_id', '=', $obj_Id)->get();

	return Response::json($actions);
});
Route::get('ajax-task', function(){
	$action_Id = Input::get('action_Id');

	$tasks = Goat::where('parent_id', '=', $action_Id)->get();

	return Response::json($tasks);
});

// Create business controller routes
Route::get('/manage/create-plan', 'CreatePlanController@show');
Route::post('/manage/create-plan', 'CreatePlanController@create');

Route::get('/dashboard2', 'DashboardController@dashboard2');

// View plan controller routes
Route::get('/view', 'ViewPlanController@index');

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
    Route::get('/dashboard2', 'DashboardController@dashboard2');
    Route::get('/dashboard', 'DashboardController@dashboard');
});
