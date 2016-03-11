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
Route::get('/manage', 'ManagePlanController@index');
Route::post('/manage', 'ManagePlanController@store');
Route::patch('/manage','ManagePlanController@update');
Route::delete('/manage', 'ManagePlanController@destroy');

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
