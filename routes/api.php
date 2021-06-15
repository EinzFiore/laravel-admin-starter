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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('list', 'Admin\UsersController@index')->name('admin.users.list');
        Route::get('show/{id}', 'Admin\UsersController@show')->name('admin.users.show');
        Route::get('get', 'Admin\UsersController@getData')->name('admin.users.get');
        Route::post('add', 'Admin\UsersController@store')->name('admin.users.add');
        Route::post('update/{id}', 'Admin\UsersController@update')->name('admin.users.update');
        Route::delete('delete/{id}', 'Admin\UsersController@destroy');
    });
    Route::post('add/role', 'Admin\UsersController@addRole')->name('admin.add.role');
});