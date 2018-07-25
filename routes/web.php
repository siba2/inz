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
Route::post('/schedule/store', 'Schedule\ScheduleController@store')->name('schedule.store');

Route::get('/customers', 'Customers\CustomersController@index')->name('customers');
Route::get('/customers/create', 'Customers\CustomersController@create')->name('customers.create');
Route::get('/customers/show/{id}', 'Customers\CustomersController@show')->name('customers.show');
Route::get('/customers/edit/{id}', 'Customers\CustomersController@edit')->name('customers.edit');
Route::get('/customers/tariffs/{id}', 'Customers\CustomersController@tariffs')->name('customers.tariffs');
Route::get('/customers/iptable/{id}', 'Customers\CustomersController@iptable')->name('customers.iptable');
Route::get('/customers/delete/{id}', 'Customers\CustomersController@delete')->name('customers.delete');
Route::get('/customers/get/all', 'Customers\CustomersController@getAll')->name('customers.get.all');
Route::get('/customers/cash/{id}', 'Customers\CustomersController@cash')->name('customers.cash');
Route::get('/customers/cash/create/{id}', 'Customers\CustomersController@cashCreate')->name('customers.cash.create');
Route::get('/customers/cash/get/all/{id}', 'Customers\CustomersController@cashGetAll')->name('iptables.cash.get.all');
Route::post('/customers/store', 'Customers\CustomersController@store')->name('customers.store');
Route::post('/customers/update', 'Customers\CustomersController@update')->name('customers.update');
Route::post('/customers/tariffs/store', 'Customers\CustomersController@tariffsStore')->name('customers.tariffs.store');
Route::post('/customers/listip', 'Customers\CustomersController@listIp')->name('customers.listip');
Route::post('/customers/iptable/store', 'Customers\CustomersController@iptableStore')->name('customers.iptable.store');
Route::post('/customers/cash/store', 'Customers\CustomersController@cashStore')->name('customers.cash.store');

Route::get('/tariffs', 'Tariffs\TariffsController@index')->name('tariffs');
Route::get('/tariffs/create', 'Tariffs\TariffsController@create')->name('tariffs.create');
Route::get('/tariffs/show/{id}', 'Tariffs\TariffsController@show')->name('tariffs.show');
Route::get('/tariffs/edit/{id}', 'Tariffs\TariffsController@edit')->name('tariffs.edit');
Route::get('/tariffs/delete/{id}', 'Tariffs\TariffsController@delete')->name('tariffs.delete');
Route::get('/tariffs/get/all', 'Tariffs\TariffsController@getAll')->name('tariffs.get.all');
Route::post('/tariffs/store', 'Tariffs\TariffsController@store')->name('tariffs.store');
Route::post('/tariffs/update', 'Tariffs\TariffsController@update')->name('tariffs.update');

Route::get('/smsapi', 'Sms\SmsApiController@index')->name('smsapi');
Route::get('/smsapi/create', 'Sms\SmsApiController@create')->name('smsapi.create');
Route::get('/smsapi/info', 'Sms\SmsApiController@info')->name('smsapi.info');
Route::get('/smsapi/delete/{id}', 'Sms\SmsApiController@delete')->name('smsapi.delete');
Route::get('/smsapi/get/all', 'Sms\SmsApiController@getAll')->name('smsapi.get.all');
Route::post('/smsapi/store', 'Sms\SmsApiController@store')->name('smsapi.store');

Route::get('/serwersms', 'Sms\SerwersmsController@index')->name('serwersms');
Route::get('/serwersms/create', 'Sms\SerwersmsController@create')->name('serwersms.create');
Route::get('/serwersms/info', 'Sms\SerwersmsController@info')->name('serwersms.info');
Route::get('/serwersms/delete/{id}', 'Sms\SerwersmsController@delete')->name('serwersms.delete');
Route::get('/serwersms/get/all', 'Sms\SerwersmsController@getAll')->name('serwersms.get.all');
Route::post('/serwersms/store', 'Sms\SerwersmsController@store')->name('serwersms.store');

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
Route::get('/iptables/create', 'Iptables\IptablesController@create')->name('iptables.create');
Route::get('/iptables/delete/{id}', 'Iptables\IptablesController@delete')->name('iptables.delete');
Route::get('/iptables/get/all', 'Iptables\IptablesController@getAll')->name('iptables.get.all');
Route::get('/iptables/node/{id}', 'Iptables\IptablesController@node')->name('iptables.node');
Route::get('/iptables/node/create/{id}', 'Iptables\IptablesController@nodeCreate')->name('iptables.node.create');
Route::get('/iptables/node/delete/{id}', 'Iptables\IptablesController@nodeDelete')->name('iptables.node.delete');
Route::get('/iptables/node/get/all/{id}', 'Iptables\IptablesController@nodeGetAll')->name('iptables.node.get.all');
Route::post('/iptables/store', 'Iptables\IptablesController@store')->name('iptables.store');
Route::post('/iptables/node/store', 'Iptables\IptablesController@nodeStore')->name('iptables.node.store');

Route::get('/documents', 'Documents\DocumentsController@index')->name('documents');
Route::get('/documents/create', 'Documents\DocumentsController@create')->name('documents.create');
Route::get('/documents/download/{name}', 'Documents\DocumentsController@download')->name('documents.download');
Route::get('/documents/delete/{name}', 'Documents\DocumentsController@delete')->name('documents.delete');
Route::get('/documents/get/all', 'Documents\DocumentsController@getAll')->name('documents.get.all');
Route::post('/documents/store', 'Documents\DocumentsController@store')->name('documents.store');








