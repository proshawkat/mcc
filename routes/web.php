<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('user')->group(function() {
    Route::middleware(['auth'])->group(function () {
        Route::get('/user-list', 'UserController@index')->name('user.user_list');
        Route::post('/profile/rating', 'UserController@rating')->name('user.profile.rating');

        Route::get('/profile', 'ProfileController@index')->name('user.profile');
        Route::post('/profile/update', 'ProfileController@update')->name('user.profile.update');
    });
});
