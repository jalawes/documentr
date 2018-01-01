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

    // $data = [
    //     'event' => 'user-signed-up',
    //     'data'  => [
    //         'username' => Auth::user()->name ?? 'Anonymous',
    //         'body'     => 'Connected',
    //     ],
    // ];
    //
    // Redis::publish('test-channel', json_encode($data));

    return view('welcome');
});

Route::post('/', function () {
    $data = [
        'event' => 'user-signed-up',
        'data'  => [
            'username' => Auth::user()->name ?? 'Anonymous',
            'body'     => request('body'),
        ],
    ];
   Redis::publish('test-channel', json_encode($data));
    if (request()->wantsJson()) {
        return response([], 202);
    }
});

// Authentication
Auth::routes();

// Authentication Providers
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login.github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback')->name('github.callback');

// Home
Route::get('/home', 'HomeController@index')->name('home');

// Profiles
Route::get('profiles', 'ProfileController@index')->name('profiles.index');
Route::get('profiles/{profile}', 'ProfileController@show')->name('profiles.show');
Route::patch('profiles/{profile}', 'ProfileController@update')->name('profiles.update');

// Documents
Route::get('documents', 'DocumentController@index')->name('documents.index');
Route::get('documents/create', 'DocumentController@create')->name('documents.create');
Route::post('documents', 'DocumentController@store')->name('documents.store');
Route::get('documents/{document}', 'DocumentController@show')->name('documents.show');
Route::get('documents/{document}/edit', 'DocumentController@edit')->name('documents.edit');
Route::patch('documents/{document}', 'DocumentController@update')->name('documents.update');
Route::delete('documents/{document}', 'DocumentController@destroy')->name('documents.destroy');

// Favorites
Route::post('documents/{document}/favorites', 'FavoritesController@store')->name('documents.favorites.store');
Route::delete('documents/{document}/favorites', 'FavoritesController@destroy')->name('document.favorites.destroy');

// Libraries
Route::get('libraries', 'LibraryController@index')->name('libraries.index');
