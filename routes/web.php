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
Route::get('/', 'PageController@index');
Route::get('login', 'PageController@login')->name('login');

// Auth
Route::post('auth/login', 'api\AuthController@login');

Route::middleware('auth')->group(function() {
    Route::post('auth/logout', 'api\AuthController@logout');
    Route::get('dashboard', 'PageController@dashboard');
});
