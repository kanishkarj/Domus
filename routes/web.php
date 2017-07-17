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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware([])->group(function () {
    Route::get('/posts/create','PostController@index');
    Route::post('/posts/store','PostController@store');
    Route::get('/channels/create','ChannelsController@index');
    Route::post('/channels/store','ChannelsController@store');
});