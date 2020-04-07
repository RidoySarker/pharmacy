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
Route::resource('/profile', 'UserController');
Route::resource('password', 'PasswordController');
Route::post('password/store', 'PasswordController@store');
Route::post('password/create', 'PasswordController@create');

Route::resource('company', 'CompanyController');
Route::post('company/store', 'CompanyController@store');
Route::post('company/update', 'CompanyController@update');

Route::resource('desk', 'DeskController');
Route::post('desk/store', 'DeskController@store');
Route::post('desk/update', 'DeskController@update');

Route::resource('medicine', 'MedicineController');
Route::post('medicine/store', 'MedicineController@store');
Route::post('medicine/update', 'MedicineController@update');