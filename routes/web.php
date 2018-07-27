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
Route::get('/password/reset', 'Auth\ResetPasswordController@index');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/schedule', 'Schedule\ScheduleController@index')->name('schedule')->middleware('permission:schedule');
Route::get('/schedule/get/all', 'Schedule\ScheduleController@getAll')->name('schedule.get.all')->middleware('permission:schedule');
Route::post('/schedule/store', 'Schedule\ScheduleController@store')->name('schedule.store')->middleware('permission:schedule');

Route::get('/customers', 'Customers\CustomersController@index')->name('customers')->middleware('permission:customers');
Route::get('/customers/create', 'Customers\CustomersController@create')->name('customers.create')->middleware('permission:customers');
Route::get('/customers/show/{id}', 'Customers\CustomersController@show')->name('customers.show')->middleware('permission:customers');
Route::get('/customers/edit/{id}', 'Customers\CustomersController@edit')->name('customers.edit')->middleware('permission:customers');
Route::get('/customers/tariffs/{id}', 'Customers\CustomersController@tariffs')->name('customers.tariffs')->middleware('permission:customers');
Route::get('/customers/iptable/{id}', 'Customers\CustomersController@iptable')->name('customers.iptable')->middleware('permission:customers');
Route::get('/customers/delete/{id}', 'Customers\CustomersController@delete')->name('customers.delete')->middleware('permission:customers');
Route::get('/customers/get/all', 'Customers\CustomersController@getAll')->name('customers.get.all')->middleware('permission:customers');
Route::get('/customers/cash/{id}', 'Customers\CustomersController@cash')->name('customers.cash')->middleware('permission:customers');
Route::get('/customers/cash/create/{id}', 'Customers\CustomersController@cashCreate')->name('customers.cash.create')->middleware('permission:customers');
Route::get('/customers/cash/get/all/{id}', 'Customers\CustomersController@cashGetAll')->name('iptables.cash.get.all')->middleware('permission:customers');
Route::post('/customers/store', 'Customers\CustomersController@store')->name('customers.store')->middleware('permission:customers');
Route::post('/customers/update', 'Customers\CustomersController@update')->name('customers.update')->middleware('permission:customers');
Route::post('/customers/tariffs/store', 'Customers\CustomersController@tariffsStore')->name('customers.tariffs.store')->middleware('permission:customers');
Route::post('/customers/listip', 'Customers\CustomersController@listIp')->name('customers.listip')->middleware('permission:customers');
Route::post('/customers/iptable/store', 'Customers\CustomersController@iptableStore')->name('customers.iptable.store')->middleware('permission:customers');
Route::post('/customers/cash/store', 'Customers\CustomersController@cashStore')->name('customers.cash.store')->middleware('permission:customers');

Route::get('/debtors', 'Debtors\DebtorsController@index')->name('debtors');//->middleware('permission:debtors');
Route::get('/debtors/get/all', 'Debtors\DebtorsController@getAll')->name('debtors.get.all');//->middleware('permission:debtors');

Route::get('/documents', 'Documents\DocumentsController@index')->name('documents')->middleware('permission:documents');
Route::get('/documents/create', 'Documents\DocumentsController@create')->name('documents.create')->middleware('permission:documents');
Route::get('/documents/download/{name}', 'Documents\DocumentsController@download')->name('documents.download')->middleware('permission:documents');
Route::get('/documents/delete/{name}', 'Documents\DocumentsController@delete')->name('documents.delete')->middleware('permission:documents');
Route::get('/documents/get/all', 'Documents\DocumentsController@getAll')->name('documents.get.all')->middleware('permission:documents');
Route::post('/documents/store', 'Documents\DocumentsController@store')->name('documents.store')->middleware('permission:documents');

Route::get('/tariffs', 'Tariffs\TariffsController@index')->name('tariffs')->middleware('permission:documents');
Route::get('/tariffs/create', 'Tariffs\TariffsController@create')->name('tariffs.create')->middleware('permission:documents');
Route::get('/tariffs/show/{id}', 'Tariffs\TariffsController@show')->name('tariffs.show')->middleware('permission:documents');
Route::get('/tariffs/edit/{id}', 'Tariffs\TariffsController@edit')->name('tariffs.edit')->middleware('permission:documents');
Route::get('/tariffs/delete/{id}', 'Tariffs\TariffsController@delete')->name('tariffs.delete')->middleware('permission:documents');
Route::get('/tariffs/get/all', 'Tariffs\TariffsController@getAll')->name('tariffs.get.all')->middleware('permission:documents');
Route::post('/tariffs/store', 'Tariffs\TariffsController@store')->name('tariffs.store')->middleware('permission:documents');
Route::post('/tariffs/update', 'Tariffs\TariffsController@update')->name('tariffs.update')->middleware('permission:documents');

Route::get('/smsapi', 'Sms\SmsApiController@index')->name('smsapi')->middleware('permission:sms');
Route::get('/smsapi/create', 'Sms\SmsApiController@create')->name('smsapi.create')->middleware('permission:sms');
Route::get('/smsapi/info', 'Sms\SmsApiController@info')->name('smsapi.info')->middleware('permission:sms');
Route::get('/smsapi/delete/{id}', 'Sms\SmsApiController@delete')->name('smsapi.delete')->middleware('permission:sms');
Route::get('/smsapi/get/all', 'Sms\SmsApiController@getAll')->name('smsapi.get.all')->middleware('permission:sms');
Route::post('/smsapi/store', 'Sms\SmsApiController@store')->name('smsapi.store')->middleware('permission:sms');
Route::post('/smsapi/info/data', 'Sms\SmsApiController@infoData')->name('smsapi.info.data')->middleware('permission:sms');

Route::get('/serwersms', 'Sms\SerwersmsController@index')->name('serwersms')->middleware('permission:sms');
Route::get('/serwersms/create', 'Sms\SerwersmsController@create')->name('serwersms.create')->middleware('permission:sms');
Route::get('/serwersms/info', 'Sms\SerwersmsController@info')->name('serwersms.info')->middleware('permission:sms');
Route::get('/serwersms/delete/{id}', 'Sms\SerwersmsController@delete')->name('serwersms.delete')->middleware('permission:sms');
Route::get('/serwersms/get/all', 'Sms\SerwersmsController@getAll')->name('serwersms.get.all')->middleware('permission:sms');
Route::post('/serwersms/store', 'Sms\SerwersmsController@store')->name('serwersms.store')->middleware('permission:sms');
Route::post('/serwersms/info/data', 'Sms\SerwersmsController@infoData')->name('serwersms.info.data')->middleware('permission:sms');

Route::get('/employees', 'Employees\EmployeesController@index')->name('employees')->middleware('permission:employees');
Route::get('/employees/create', 'Employees\EmployeesController@create')->name('employees.create')->middleware('permission:employees');
Route::get('/employees/show/{id}', 'Employees\EmployeesController@show')->name('employees.show')->middleware('permission:employees');
Route::get('/employees/edit/{id}', 'Employees\EmployeesController@edit')->name('employees.edit')->middleware('permission:employees');
Route::get('/employees/delete/{id}', 'Employees\EmployeesController@delete')->name('employees.delete')->middleware('permission:employees');
Route::get('/employees/get/all', 'Employees\EmployeesController@getAll')->name('employees.get.all')->middleware('permission:employees');
Route::post('/employees/store', 'Employees\EmployeesController@store')->name('employees.store')->middleware('permission:employees');
Route::post('/employees/update', 'Employees\EmployeesController@update')->name('employees.update')->middleware('permission:employees');

Route::get('/administrators/users', 'Administrators\UsersController@index')->name('administrators.users')->middleware('permission:administrators');
Route::get('/administrators/users/create', 'Administrators\UsersController@create')->name('administrators.users.create')->middleware('permission:administrators');
Route::get('/administrators/users/show/{id}', 'Administrators\UsersController@show')->name('administrators.users.show')->middleware('permission:administrators');
Route::get('/administrators/users/edit/{id}', 'Administrators\UsersController@edit')->name('administrators.users.edit')->middleware('permission:administrators');
Route::get('/administrators/users/delete/{id}', 'Administrators\UsersController@delete')->name('administrators.users.delete')->middleware('permission:administrators');
Route::get('/administrators/users/get/all', 'Administrators\UsersController@getAll')->name('administrators.users.get.all')->middleware('permission:administrators');
Route::post('/administrators/users/store', 'Administrators\UsersController@store')->name('administrators.users.store')->middleware('permission:administrators');
Route::post('/administrators/users/update', 'Administrators\UsersController@update')->name('administrators.users.update')->middleware('permission:administrators');

Route::get('/administrators/roles', 'Administrators\RolesController@index')->name('administrators.roles')->middleware('permission:administrators');
Route::get('/administrators/roles/create', 'Administrators\RolesController@create')->name('administrators.roles.create')->middleware('permission:administrators');
Route::get('/administrators/roles/show/{id}', 'Administrators\RolesController@show')->name('administrators.roles.show')->middleware('permission:administrators');
Route::get('/administrators/roles/edit/{id}', 'Administrators\RolesController@edit')->name('administrators.roles.edit')->middleware('permission:administrators');
Route::get('/administrators/roles/delete/{id}', 'Administrators\RolesController@delete')->name('administrators.roles.delete')->middleware('permission:administrators');
Route::get('/administrators/roles/get/all', 'Administrators\RolesController@getAll')->name('administrators.roles.get.all')->middleware('permission:administrators');
Route::post('/administrators/roles/store', 'Administrators\RolesController@store')->name('administrators.roles.store')->middleware('permission:administrators');
Route::post('/administrators/roles/update', 'Administrators\RolesController@update')->name('administrators.roles.update')->middleware('permission:administrators');

Route::get('/iptables', 'Iptables\IptablesController@index')->name('iptables')->middleware('permission:iptables');
Route::get('/iptables/create', 'Iptables\IptablesController@create')->name('iptables.create')->middleware('permission:iptables');
Route::get('/iptables/delete/{id}', 'Iptables\IptablesController@delete')->name('iptables.delete')->middleware('permission:iptables');
Route::get('/iptables/get/all', 'Iptables\IptablesController@getAll')->name('iptables.get.all')->middleware('permission:iptables');
Route::get('/iptables/node/{id}', 'Iptables\IptablesController@node')->name('iptables.node')->middleware('permission:iptables');
Route::get('/iptables/node/create/{id}', 'Iptables\IptablesController@nodeCreate')->name('iptables.node.create')->middleware('permission:iptables');
Route::get('/iptables/node/delete/{id}', 'Iptables\IptablesController@nodeDelete')->name('iptables.node.delete')->middleware('permission:iptables');
Route::get('/iptables/node/get/all/{id}', 'Iptables\IptablesController@nodeGetAll')->name('iptables.node.get.all')->middleware('permission:iptables');
Route::post('/iptables/store', 'Iptables\IptablesController@store')->name('iptables.store')->middleware('permission:iptables');
Route::post('/iptables/node/store', 'Iptables\IptablesController@nodeStore')->name('iptables.node.store')->middleware('permission:iptables');










