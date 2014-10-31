<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Event::listen('iluminate.query', function($query)
// {

// 	//var_dump($query);

// });


Route::get('/', ['as' => 'home', 'uses' => 'TasksController@index']);
Route::post('/tasks', 'TasksController@store');
Route::patch('tasks/{id}', ['as' => 'tasks.update', 'uses' => 'TasksController@update']);

Route::get('/', 'TasksController@index');
Route::get('tasks/{id}', 'TasksController@show')->where('id', '\d+');

Route::get('{username}/tasks', 'UserTasksController@index');
//Route::get('{username}/tasks/{id}', ['as' => 'user.tasks.show', 'uses' => 'UserTasksController@show']);

// Route::get('{username}/tasks', function($username)
// {

// 	//find user by theis username from the users table
// 	$user = User::whereUsername($username)->first();


// 	//get all tasks associated with that user
// 	//return Task::whereUserId($user->id)->get();

// 	return $user->tasks;

// });

// Route::get('{username}/tasks/{id}', function ($username, $id)
// {
// 	//find the task by its id
// 	$user = User::with('tasks')->whereUsername($username)->first();
// 	$task = $user->tasks;
// 	//$task = $user->tasks()->findOrFail($id);

// 	// and load a view to display it
// 	return View::make('tasks.show', compact('user', 'task'));
// });

