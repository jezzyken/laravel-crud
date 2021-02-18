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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// Routes for Company
Route::get('/company', 'CompanyController@index')->name('company.index');
Route::get('/create','CompanyController@create')->name('create.company');
Route::post('/store', 'CompanyController@store')->name('company.store');
Route::get('/edit/company/{id}', 'CompanyController@edit');
Route::post('/update/company/{id}', 'CompanyController@update');
Route::get('/delete/company/{id}', 'CompanyController@delete');

// Routes for Employee
Route::get('/employee', 'EmployeeController@index')->name('employee.index');
Route::get('/create1', 'EmployeeController@create')->name('create.employee');
Route::post('/store1', 'EmployeeController@store')->name('employee.store');
Route::get('/edit/employee/{id}', 'EmployeeController@edit');
Route::post('/update/employee/{id}', 'EmployeeController@update');
Route::get('/delete/employee/{id}', 'EmployeeController@delete');






