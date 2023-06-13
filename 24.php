<?php

    Route::get('/customers/show/{id}', 'Customers\CustomersController@show')->name('customers.show')->middleware('permission:customers');