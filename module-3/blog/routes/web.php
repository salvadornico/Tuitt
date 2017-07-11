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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
	return "Hello World!";
});

Route::get('/articles', function () {
	$article1 = "Tutorial";
	$article2 = "Getting started";
	return view('articles.article_list', compact('article1', 'article2'));
});