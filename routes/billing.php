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

Route::group(['namespace'=> 'Billing', 'middleware' => 'billing_check'], function()
{
	Route::get('/home', [
		'as'	=> 'billing_home',
		'uses'	=> 'UserController@home'
    ]);

    Route::get('/home/filter_consumption', [
        'as'    => 'billing_filter_consumption_chart',
        'uses'  => 'UserController@filter_consumption_chart'
    ]);

    //clients functions
    
    Route::get('/clients', [
		'as'	=> 'billing_clients',
		'uses'	=> 'UserController@clients'
    ]);

    Route::post('/clients-store/',[
    	'as'	=> 'billing_create_client',
    	'uses'	=> 'ClientsController@clients_store'
    ]);

    Route::post('/clients-update/',[
    	'as'	=> 'billing_client_update',
    	'uses'	=> 'ClientsController@clients_update'
    ]);

    Route::get('/client-lock/{id}',[
    	'as'	=> 'billing_client_lock',
    	'uses'	=> 'ClientsController@client_lock'
    ]);

    Route::get('/client-view-records/{id}',[
    	'as'	=> 'billing_client_view_records',
    	'uses'	=> 'ClientsController@view_records'
    ]);

    Route::post('/client-store-records/{id}',[
    	'as'	=> 'billing_client_store',
    	'uses'	=> 'ClientsController@view_records_Store'
    ]);

    Route::post('/client-get-info',[
        'as'    => 'billing_get_client_info',
        'uses'  => 'ClientsController@admin_get_client_info'
    ]);

    Route::post('/client-waterbiller-update',[
        'as'    => 'billing_client_update_water',
        'uses'  => 'ClientsController@admin_client_update_water'
    ]);

    //request
    Route::get('/pending_bills', [
		'as'	=> 'billing_pending_bills',
		'uses'	=> 'ClientRequestController@pending_bills'
	]);
    
    Route::get('/approved_bills', [
		'as'	=> 'billing_approved_bills',
		'uses'	=> 'ClientRequestController@approved_bills'
    ]);

    Route::post('/approved_bills/{id}', [
		'as'	=> 'billing_approved_bills_submit',
		'uses'	=> 'ClientRequestController@approved_bills_submit'
    ]);

	Route::get('/logout', [
		'as'	=> 'billing_logout',
		'uses'	=> 'UserController@logout'
	]);
});