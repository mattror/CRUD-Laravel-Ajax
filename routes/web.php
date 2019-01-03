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


// student
Route::get('/',function(){
	return view('customers_view.home');
});

Route::get('/students/', function () {
    return view('students_view.add_form');
});

Route::post('/students/add','StudentController@add');
Route::get('/students/view','StudentController@view');

Route::get('/students/edit/{id}','StudentController@edit');
Route::post('/students/update','StudentController@update');
Route::get('/students/delete/{id}','StudentController@delete');


// Customer

Route::get('/customers/','Customers_Controller@list');

Route::post('/customers/add','Customers_Controller@add')->name('addcustomer');
Route::get('/customers/list','Customers_Controller@list');
Route::post('/customers/delete','Customers_Controller@delete')->name('deletecustomer');
Route::post('/customers/edit','Customers_Controller@edit');
Route::post('/customers/update','Customers_Controller@update')->name('editcustomer');

Route::post('/customers/live_search','Customers_Controller@live_search')->name('search_customers');

// Auth

Route::get('/register','AuthController@index');