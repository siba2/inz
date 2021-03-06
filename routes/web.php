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
Auth::routes();

Route::get('/', function () {
    return redirect('home');
})->name('/');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/schedule', 'Schedule\ScheduleController@index')->name('schedule');
Route::get('/schedule/get/all', 'Schedule\ScheduleController@getAll')->name('schedule.get.all');


Route::get('/customers', 'Customers\CustomersController@index')->name('customers');
Route::get('/customers/create', 'Customers\CustomersController@create')->name('customers.create');
Route::get('/customers/show/{id}', 'Customers\CustomersController@show')->name('customers.show');
Route::get('/customers/edit/{id}', 'Customers\CustomersController@edit')->name('customers.edit');
Route::get('/customers/tariffs/{id}', 'Customers\CustomersController@tariffs')->name('customers.tariffs');
Route::get('/customers/iptable/{id}', 'Customers\CustomersController@iptable')->name('customers.iptable');
Route::get('/customers/delete/{id}', 'Customers\CustomersController@delete')->name('customers.delete');
Route::get('/customers/get/all', 'Customers\CustomersController@getAll')->name('customers.get.all');
Route::post('/customers/store', 'Customers\CustomersController@store')->name('customers.store');
Route::post('/customers/update', 'Customers\CustomersController@update')->name('customers.update');
Route::post('/customers/tariffs/store', 'Customers\CustomersController@tariffsStore')->name('customers.tariffs.store');


Route::get('/tariffs', 'Tariffs\TariffsController@index')->name('tariffs');
Route::get('/tariffs/create', 'Tariffs\TariffsController@create')->name('tariffs.create');
Route::get('/tariffs/show/{id}', 'Tariffs\TariffsController@show')->name('tariffs.show');
Route::get('/tariffs/edit/{id}', 'Tariffs\TariffsController@edit')->name('tariffs.edit');
Route::get('/tariffs/delete/{id}', 'Tariffs\TariffsController@delete')->name('tariffs.delete');
Route::get('/tariffs/get/all', 'Tariffs\TariffsController@getAll')->name('tariffs.get.all');
Route::post('/tariffs/store', 'Tariffs\TariffsController@store')->name('tariffs.store');
Route::post('/tariffs/update', 'Tariffs\TariffsController@update')->name('tariffs.update');


Route::get('/smsapi', 'Sms\SmsApiController@index')->name('smsapi');

Route::get('/employees', 'Employees\EmployeesController@index')->name('employees');
Route::get('/employees/create', 'Employees\EmployeesController@create')->name('employees.create');
Route::get('/employees/show/{id}', 'Employees\EmployeesController@show')->name('employees.show');
Route::get('/employees/edit/{id}', 'Employees\EmployeesController@edit')->name('employees.edit');
Route::get('/employees/delete/{id}', 'Employees\EmployeesController@delete')->name('employees.delete');
Route::get('/employees/get/all', 'Employees\EmployeesController@getAll')->name('employees.get.all');
Route::post('/employees/store', 'Employees\EmployeesController@store')->name('employees.store');
Route::post('/employees/update', 'Employees\EmployeesController@update')->name('employees.update');


Route::get('/admin', 'Admin\AdminController@index')->name('admin');
Route::get('/admin/create', 'Admin\AdminController@create')->name('admin.create');
Route::get('/admin/show/{id}', 'Admin\AdminController@show')->name('admin.show');
Route::get('/admin/edit/{id}', 'Admin\AdminController@edit')->name('admin.edit');
Route::get('/admin/delete/{id}', 'Admin\AdminController@delete')->name('admin.delete');
Route::get('/admin/get/all', 'Admin\AdminController@getAll')->name('admin.get.all');
Route::post('/admin/store', 'Admin\AdminController@store')->name('admin.store');
Route::post('/admin/update', 'Admin\AdminController@update')->name('admin.update');

Route::get('/iptables', 'Iptables\IptablesController@index')->name('iptables');
Route::get('/iptables/class/create', 'Iptables\IptablesController@createClass')->name('iptables.class.create');
Route::get('/iptables/class/delete/{id}', 'Iptables\IptablesController@deleteClass')->name('admin.class.delete');
Route::post('/iptables/class/store', 'Iptables\IptablesController@storeClass')->name('iptables.class.store');
