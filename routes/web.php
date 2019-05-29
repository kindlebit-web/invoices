<?php
Route::get('/', 'PagesController@index');

Route::get('/settings', 'SettingsController@index')->name('settings.index');
Route::post('/settings', 'SettingsController@update')->name('settings.update');
Route::post('/profile', 'ProfileController@update')->name('profile.update');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('customers', 'CustomerController');
Route::resource('invoices', 'InvoiceController');
Route::get('invoices/download/{invoice_id}', 'InvoiceController@download')->name('invoices.download');
Route::get('invoices/email/{invoice_id}', 'InvoiceController@email')->name('invoices.email');