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
Route::get('profile', 'ProfileController@index')->name('profile.index');

Route::get('documents', 'DocumentController@index')->name('documents.index');
Route::get('documents/create', 'DocumentController@create')->name('documents.create');
Route::post('/documents', 'DocumentController@store')->name('documents.store');
