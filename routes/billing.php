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
    
    Route::get('/clients', [
		'as'	=> 'billing_clients',
		'uses'	=> 'UserController@clients'
    ]);

    Route::get('/pending_bills', [
		'as'	=> 'billing_pending_bills',
		'uses'	=> 'ClientRequestController@pending_bills'
	]);
    
    Route::get('/approved_bills', [
		'as'	=> 'billing_approved_bills',
		'uses'	=> 'ClientRequestController@approved_bills'
    ]);

	Route::get('/logout', [
		'as'	=> 'billing_logout',
		'uses'	=> 'UserController@logout'
	]);
});