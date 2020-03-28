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

Route::get('/', 'PagesController@index');
Route::get('/blog', 'PagesController@blog');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');


// novi post
Route::get("/createPost", "PagesController@createPost")->middleware(['auth']);


Route::get("/editPost/{id}", "PagesController@editPost")->middleware(['auth']);

//rute za postove

Route::resource('/post', 'PostsController');

//rute za usera
Route::resource('/user', 'UserController')->middleware(['auth']);
Route::get("/createUser", "PagesController@createUser")->middleware(['auth']);
Route::get("/editUser/{id}", "PagesController@editUser")->middleware(['auth']);

//sortiranje po kategoriji

Route::get("/post/category/{id}", "PostsController@getPostsByCategory");

//login i registracija

Auth::routes();
Route::get('/dashboard', 'DashboardController@index');

// admin panel

Route::get('/admin', 'PagesController@admin')->middleware(['auth']);
Route::get('/adminUsers', 'PagesController@adminUsers')->middleware(['auth']);
