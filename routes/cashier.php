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

Route::group(['namespace'=> 'Cashier', 'middleware'=> 'cashier_check'], function()
{
	Route::get('/home', [
		'as'	=> 'cashier_home',
		'uses'	=> 'UserController@home'
    ]);
    
    Route::get('/clients', [
		'as'	=> 'cashier_clients',
		'uses'	=> 'UserController@clients'
    ]);

    Route::post('/clients',[
    	'as'	=> 'cashier_create_client',
    	'uses'	=> 'ClientsController@clients_store'
    ]);

    Route::post('/clients-update/',[
    	'as'	=> 'cashier_client_update',
    	'uses'	=> 'ClientsController@clients_update'
    ]);

    Route::get('/client-lock/{id}',[
    	'as'	=> 'cashier_client_lock',
    	'uses'	=> 'ClientsController@client_lock'
    ]);

    Route::get('/client-view-records/{id}',[
    	'as'	=> 'cashier_client_view_records',
    	'uses'	=> 'ClientsController@view_records'
    ]);

    Route::post('/client-store-records/{id}',[
    	'as'	=> 'cashier_client_store',
    	'uses'	=> 'ClientsController@view_records_Store'
    ]);

    Route::post('/client-get-info',[
        'as'    => 'cashier_get_client_info',
        'uses'  => 'ClientsController@admin_get_client_info'
    ]);

    Route::post('/client-waterbiller-update',[
        'as'    => 'cashier_client_update_water',
        'uses'  => 'ClientsController@admin_client_update_water'
    ]);

	Route::get('/logout', [
		'as'	=> 'cashier_logout',
		'uses'	=> 'UserController@logout'
	]);
});