<?php 

Route::group(['namespace'=> 'Client', 'middleware'=> 'client_check'], function()
{
	Route::get('/home', [
		'as'	=> 'client_home',
		'uses'	=> 'UserController@home'
    ]);
    
    Route::get('/profile', [
		'as'	=> 'client_profile',
		'uses'	=> 'UserController@profile'
    ]);
    
    Route::get('/current_balance', [
		'as'	=> 'client_current_balance',
		'uses'	=> 'UserController@current_balance'
    ]);
    
    Route::get('/trans_history', [
		'as'	=> 'client_trans_history',
		'uses'	=> 'UserController@trans_history'
	]);

	//request
    Route::get('/request_pending', [
		'as'	=> 'client_request_pending',
		'uses'	=> 'RequestController@request_pending'
	]);

	Route::get('/request_approved', [
		'as'	=> 'client_request_approved',
		'uses'	=> 'RequestController@request_approved'
	]);


	Route::get('/logout', [
		'as'	=> 'client_logout',
		'uses'	=> 'UserController@logout'
	]);
});