<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TaskController@showTasks');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
	Route::post('/', 'TaskController@addTask');

	Route::get('/mark-done/{id}', 'TaskController@markDone');

	Route::get('/edit/{id}', 'TaskController@edit');
	Route::post('/edit/{id}', 'TaskController@saveEdit');
});

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
	// Admin functions here
	Route::get('/delete/{id}', 'TaskController@delete');
	Route::get('/mark-undone/{id}', 'TaskController@markUndone');
});