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
Route::get('/about', 'PagesController@about');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/admin', 'AdminController@index');

Route::get('/profile/{id}', 'UsersController@editprofile');
Route::put('/profile/{id}', 'UsersController@updateprofile');
Route::put('/profile/img/{id}', 'UsersController@updateImage');
Route::get('/users', 'UsersController@index');
Route::get('/users/{id}', 'UsersController@show');
Route::post('/users/assign/{id}', 'UsersController@assignRole');

Route::get('/test','TestsController@index');
Route::get('/test/{id}','TestsController@getTest');
Route::post('/test/{id}','TestsController@getAnswer');
Route::get('/result/{id?}','TestsController@showResult');
Route::get('/allresult','TestsController@allResult');


Route::get('/shop','ShopsController@index');

Route::get('/messages/send', 'MessagesController@send');


Route::resource('booklate', 'BooklatesController');

Route::resource('questions', 'QuestionsController');

Route::resource('messages', 'MessagesController');
