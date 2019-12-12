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

Route::group(['namespace'=> 'Admin', 'middleware'=> 'admin_check'], function()
{
	Route::get('/home', [
		'as'	=> 'admin_home',
		'uses'	=> 'UserController@home'
    ]);

    Route::get('/home/filter_income', [
        'as'    => 'filter_income_chart',
        'uses'  => 'UserController@filter_income_chart'
    ]);

    Route::get('/home/filter_consumption', [
        'as'    => 'filter_consumption_chart',
        'uses'  => 'UserController@filter_consumption_chart'
    ]);

    //Staff
    
    Route::get('/staffs', [
		'as'	=> 'admin_staffs',
		'uses'	=> 'UserController@staffs'
    ]);

    Route::post('/staffs/store', [
		'as'	=> 'admin_store_staffs',
		'uses'	=> 'StaffsController@staffs_store'
    ]);

    Route::post('/staffs/update', [
		'as'	=> 'admin_update_staffs',
		'uses'	=> 'StaffsController@staffs_update'
    ]);

    Route::post('/staffs/resign', [
		'as'	=> 'admin_resign_staffs',
		'uses'	=> 'StaffsController@staffs_resign'
    ]);

    //Clients
    
    Route::get('/clients', [
		'as'	=> 'admin_clients',
		'uses'	=> 'UserController@clients'
    ]);

    Route::post('/clients/store', [
		'as'	=> 'admin_store_clients',
		'uses'	=> 'ClientsController@clients_store'
    ]);

    Route::post('/clients/update', [
		'as'	=> 'admin_update_clients',
		'uses'	=> 'ClientsController@clients_update'
    ]);

    Route::get('/clients-lock/{id}',[
    	'as'	=> 'admin_client_lock',
    	'uses'	=> 'ClientsController@client_lock'
    ]);

    Route::get('/clients-records/{id}', [
    	'as'	=> 'admin_view_client_records',
    	'uses'	=> 'ClientsController@view_records'
    ]);

    Route::post('/clients-records/{id}', [
    	'as'	=> 'admin_view_client_records_store',
    	'uses'	=> 'ClientsController@view_records_Store'
    ]);

    Route::get('/client-bill-pay/{id}/{bill_pay}',[
        'as'    => 'admin_client_paid',
        'uses'  => 'ClientsController@admin_client_paid'
    ]);

    Route::post('/client-get-info',[
        'as'    => 'admin_get_client_info',
        'uses'  => 'ClientsController@admin_get_client_info'
    ]);

    Route::post('/client-waterbiller-update',[
        'as'    => 'admin_client_update_water',
        'uses'  => 'ClientsController@admin_client_update_water'
    ]);

    //Water Rates
    
    Route::get('/water_rates', [
		'as'	=> 'admin_water_rates',
		'uses'	=> 'WaterRatesControlller@water_rates'
    ]);

    Route::post('/water_rates',[
    	'as'	=> 'admin_water_store',
    	'uses'	=> 'WaterRatesControlller@store'
    ]);


    //Reports
    
    Route::get('/reports', [
		'as'	=> 'admin_reports',
		'uses'	=> 'UserController@reports'
	]);

	Route::get('/logout', [
		'as'	=> 'admin_logout',
		'uses'	=> 'UserController@logout'
	]);

});