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


/* Login controllers */
Route::get('/', function () {
    return view('login');
});
Route::post('/', 'DashboardController@login');

// Manage Plan Controller
Route::get('/managePlan', 'ManagePlanController@home');

/* Dashboard controllers*/
Route::get('/dashboard', function() { return view("dashboard");});
Route::get('/{id}', 'DashboardController@dashboard');

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
