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

Route::get('/upload', 'UploadController@uploadForm');
Route::post('/upload', 'UploadController@uploadSubmit');
Route::get('/photos/{product}', 'UploadController@show');
Route::get('/gallery', 'UploadController@gallery');
ROute::get('/dashboard', 'UploadController@dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
