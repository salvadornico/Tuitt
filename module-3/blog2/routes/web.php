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

Route::get("/", "BlogController@displayList");
Route::get("/blog/{id}", "BlogController@displayOne");

Route::get("/tag/{id}", "TagController@displayTagArticles");

// Route::post("addTag", "TagController@addTag");
Route::post("/blog/{id}", "TagController@addTag");

Route::get("test", "TagController@test");