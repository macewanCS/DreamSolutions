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

// Create business controller routes
Route::get('/manage/create-new-plan', 'WizardController@create');

// Manage Plan controller routes
Route::resource('/manage', 'ManagePlanController');

// Create business controller routes
Route::get('wizard', 'WizardController@showIndex');
Route::post('wizard', 'WizardController@createBP');


Route::patch('wizard/goals', 'WizardController@goalsToIndex');
Route::get('wizard/goals', 'WizardController@showGoals');
Route::post('wizard/goals', 'WizardController@createGoals');

Route::patch('wizard/goals/objectives', 'WizardController@objectivesToGoal');
Route::get('wizard/goals/objectives', 'WizardController@showObjectives');
Route::post('wizard/goals/objectives', 'WizardController@createObjectives');

Route::patch('wizard/goals/objectives/actions', 'WizardController@actionsToObjectives');
Route::get('wizard/goals/objectives/actions', 'WizardController@showActions');
Route::post('wizard/goals/objectives/actions', 'WizardController@createActions');


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
