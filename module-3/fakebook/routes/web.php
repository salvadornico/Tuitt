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

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'FriendController@displayAll');
	Route::get('/user/{id}', 'FriendController@displaySingleUser');

	Route::get('user/{id}/add', 'FriendController@addFriendRequest');

	Route::get('accept_request/{id}', 'FriendController@acceptFriend');
	Route::get('deny_request/{id}', 'FriendController@denyFriend');

	Route::get('test/{id}', 'FriendController@test');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
