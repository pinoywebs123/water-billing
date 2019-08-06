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
    
    Route::get('/client_records', [
		'as'	=> 'cashier_client_records',
		'uses'	=> 'UserController@client_records'
	]);

	Route::get('/logout', [
		'as'	=> 'cashier_logout',
		'uses'	=> 'UserController@logout'
	]);
});