<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/tes', function () {
    return view('layouts.base');
});
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');

Route::prefix('admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('list', 'Admin\UsersController@index')->name('admin.users.list');
        Route::get('show/{id}', 'Admin\UsersController@show')->name('admin.users.show');
        Route::get('get', 'Admin\UsersController@getData')->name('admin.users.get');
        Route::post('add', 'Admin\UsersController@store')->name('admin.users.add');
        Route::post('update/{id}', 'Admin\UsersController@update')->name('admin.users.update');
        Route::get('delete/{id}', 'Admin\UsersController@destroy');
    });
    Route::post('add/role', 'Admin\UsersController@addRole')->name('admin.add.role');
});