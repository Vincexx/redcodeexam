<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Users
Route::prefix('user')->group(function () {
    Route::get('/list', 'api\UserController@list');
    Route::post('/store', 'api\UserController@store');
    Route::get('/show/{user}', 'api\UserController@getUser');
    Route::put('/update/{user}', 'api\UserController@update');
    Route::delete('/destroy/{user}', 'api\UserController@destroy');
});

// Roles
Route::prefix('role')->group(function () {
    Route::get('list', 'api\RoleController@list');
    Route::post('store', 'api\RoleController@store');
    Route::get('show/{role}', 'api\RoleController@getRole');
    Route::put('update/{role}', 'api\RoleController@update');
    Route::delete('destroy/{role}', 'api\RoleController@destroy');
});
