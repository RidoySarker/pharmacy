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

Route::get('/hi',function(){
	return "how r u";
});

Route::get('/hello',function(){
	return "Hello";
});

Route::get('/admin', 'AdminController@index');
Route::get('/home', 'HomeController@index');
Route::resource('catagory', 'CatagoryController');
