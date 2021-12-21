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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/login', 'Auth\LoginController@index')->middleware('CheckLogout')->name('login');

Route::post('/login', 'Auth\LoginController@HandleLogin')->middleware('CheckLogout')->name('handle.login');

Route::prefix('admin')->middleware('CheckLogin')->group(function () {
    Route::get('logout', 'Auth\LoginController@HandleLogout')->name('logout');
    Route::get('/','AdminController@index' )->name('admin');
});