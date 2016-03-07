<?php

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
Route::resource('/manage', 'ManagePlanController');

// Create business controller routes
Route::get('/manage/create-plan', 'CreatePlanController@showYears');
Route::post('/manage/create-plan', 'CreatePlanController@createBP');


Route::patch('/manage/create-plan/goals', 'CreatePlanController@goalsToYears');
Route::get('/manage/create-plan/goals', 'CreatePlanController@showGoals');
Route::post('/manage/create-plan/goals', 'CreatePlanController@createGoals');

Route::patch('/manage/create-plan/objectives', 'CreatePlanController@objectivesToGoal');
Route::get('/manage/create-plan/objectives', 'CreatePlanController@showObjectives');
Route::post('/manage/create-plan/objectives', 'CreatePlanController@createObjectives');

Route::patch('/manage/create-plan/actions', 'CreatePlanController@actionsToObjectives');
Route::get('/manage/create-plan/actions', 'CreatePlanController@showActions');
Route::post('/manage/create-plan/actions', 'CreatePlanController@createActions');


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
    Route::get('/dashboard', 'DashboardController@dashboard');
});
