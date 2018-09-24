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

/*******************ADMIN************************/
Route::prefix('adm')->group(function () {

	Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');

	/*------------BANNERS----------------*/
    Route::resource('banners', 'Adm\BannersController')->middleware('admin');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
