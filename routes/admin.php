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
    
    Route::get('/staffs', [
		'as'	=> 'admin_staffs',
		'uses'	=> 'UserController@staffs'
    ]);

    Route::post('/staffs/store', [
		'as'	=> 'admin_store_staffs',
		'uses'	=> 'UserController@staffs_store'
    ]);

    Route::post('/staffs/update', [
		'as'	=> 'admin_update_staffs',
		'uses'	=> 'UserController@staffs_update'
    ]);
    
    Route::get('/consumers', [
		'as'	=> 'admin_consumers',
		'uses'	=> 'UserController@consumers'
    ]);
    
    Route::get('/water_rates', [
		'as'	=> 'admin_water_rates',
		'uses'	=> 'UserController@water_rates'
    ]);
    
    Route::get('/reports', [
		'as'	=> 'admin_reports',
		'uses'	=> 'UserController@reports'
	]);

	Route::get('/logout', [
		'as'	=> 'admin_logout',
		'uses'	=> 'UserController@logout'
	]);

});