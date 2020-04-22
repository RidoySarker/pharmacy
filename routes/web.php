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

Route::get('/home', function () {
    return Redirect::to('admin');
});


Route::middleware('auth')->group(function () {
	//Dashboard_Data
	Route::get('/stock_data', 'AdminController@stock_data');
	Route::get('/customer_data', 'AdminController@customer_data');
	Route::get('/company_data', 'AdminController@company_data');
	Route::get('/medicine_data', 'AdminController@medicine_data');
	Route::get('/expense_data', 'AdminController@expense_data');
	Route::get('/invoice_data', 'AdminController@invoice_data');
	Route::get('/expire_data', 'AdminController@expire_data');
	Route::get('/outstock_data', 'AdminController@outstock_data');
	//Catagory
	Route::resource('catagory', 'CatagoryController');
	Route::post('catagory/store', 'CatagoryController@store');
	Route::post('catagory/update', 'CatagoryController@update');
	//Profile
	Route::resource('/profile', 'UserController');
	Route::resource('password', 'PasswordController');
	Route::post('password/store', 'PasswordController@store');
	Route::post('password/create', 'PasswordController@create');
	//Company
	Route::resource('company', 'CompanyController');
	Route::get('companyData', 'CompanyController@companyData');
	Route::post('company/store', 'CompanyController@store');
	Route::post('company/update', 'CompanyController@update');
	//Desk
	Route::resource('desk', 'DeskController');
	Route::post('desk/store', 'DeskController@store');
	Route::post('desk/update', 'DeskController@update');
	//Medicine
	Route::resource('medicine', 'MedicineController');
	Route::get('medicineTable', 'MedicineController@medicineTable');
	Route::get('medicine/show/{id}', 'MedicineController@show');
	Route::post('medicine/store', 'MedicineController@store');
	Route::post('medicine/update', 'MedicineController@update');
	//Customer
	Route::resource('/customer', 'CustomerController');
	Route::post('/customer/store', 'CustomerController@store');
	Route::post('/customer/update', 'CustomerController@update');
	//Expense_Catagory
	Route::resource('/expense_catagory', 'ExpenseController');
	Route::post('/expense_catagory/store', 'ExpenseController@store');
	Route::post('/expense_catagory/update', 'ExpenseController@update');
	//Expense_For
	Route::resource('/expense_for', 'ExpenseForController');
	Route::post('/expense_for/store', 'ExpenseForController@store');
	Route::post('/expense_for/update', 'ExpenseForController@update');
	//Purcase
	Route::resource('purcase', 'PurcaseController');
	Route::get('medicine_name/{company}', 'PurcaseController@medicine_name');
	Route::get('medicine_list/{medicine_code}', 'PurcaseController@medicine_list');
	Route::post('purcase/store', 'PurcaseController@store');
	Route::post('purcase/update', 'PurcaseController@update');
	Route::get('/rest_report', 'PurcaseController@rest_report');
	//Stock_Report
	Route::get('stock_report', 'StockController@stock_report');
	Route::get('stockTable', 'StockController@stockTable');
	
	Route::get('medicine_report', 'StockController@medicine_data');
	Route::get('medicine_report/{name}', 'StockController@medicine_report');
	Route::get('/expire_date', 'StockController@index');
	Route::get('/out_of_stock', 'StockController@out_of_stock');
	//Whole_Sale
	Route::resource('whole_sale', 'WholeSaleController');
	Route::get('medicine_all/{medicine}', 'WholeSaleController@medicine_all');
	Route::post('whole_sale/store', 'WholeSaleController@store');
	Route::get('whole_sale/show/{id}', 'WholeSaleController@show');

	//Retail_Sale
	Route::resource('retail_sale', 'RetailSaleController');
	Route::get('all_medicine/{medicine}', 'RetailSaleController@all_medicine');
	Route::post('retail_sale/store', 'RetailSaleController@store');
	Route::get('retail_sale/show/{id}', 'RetailSaleController@show');
	Route::get('retail_sale_report', 'RetailSaleController@retail_sale_report');
	//Whole_Sale_Report
	Route::resource('whole_sale_report', 'WholeSaleReportController');
	Route::post('/store', 'WholeSaleReportController@store');
	//Retail_Sale_Report
	Route::resource('retailsale_report', 'RetailSaleReportController');
	Route::post('retailsale_report/store', 'RetailSaleReportController@store');
	//Daily_Report
	Route::resource('daily_report', 'DailyReportController');

});