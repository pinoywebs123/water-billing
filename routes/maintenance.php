<?php 

Route::group(['namespace'=> 'Maintenance'], function()
{
	Route::get('/home', [
		'as'	=> 'maintenance_home',
		'uses'	=> 'UserController@home'
    ]);
    
    Route::get('/client_records', [
		'as'	=> 'maintenance_client_records',
		'uses'	=> 'UserController@client_records'
    ]);
    
    Route::get('/pending_bills', [
		'as'	=> 'maintenance_pending_bills',
		'uses'	=> 'UserController@pending_bills'
	]);
    
    Route::get('/approved_bills', [
		'as'	=> 'maintenance_approved_bills',
		'uses'	=> 'UserController@approved_bills'
    ]);

	Route::get('/logout', [
		'as'	=> 'maintenance_logout',
		'uses'	=> 'UserController@logout'
	]);
});