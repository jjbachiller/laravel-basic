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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }

    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'CompanyController@index')->name('home');
// Route::get('/logout', 'Auth\LoginController@logout');
// Route::resources([
//     'companies' => 'CompanyController',
//     'employees' => 'EmployeeController'
// ]);
Route::resource('companies', 'CompanyController');
Route::resource('employees', 'EmployeeController')->except(['create']);
Route::get('employees/create/{companyId}', 'EmployeeController@create')->name('employees.create');
Route::get('companies/{companyId}/add-employee', 'CompanyController@loadAddNewEmployeeModal')->name('companies.add-employee-modal');
