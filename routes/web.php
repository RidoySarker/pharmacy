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



Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin', 'AdminController@index');

Route::get('/home', 'HomeController@index');

Route::resource('catagory', 'CatagoryController');
Route::post('catagory/store', 'CatagoryController@store');
Route::post('catagory/update', 'CatagoryController@update');
