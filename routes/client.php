<?php 

Route::group(['namespace'=> 'Client', 'middleware'=> 'client_check'], function()
{
	Route::get('/home', [
		'as'	=> 'client_home',
		'uses'	=> 'UserController@home'
	]);

	Route::get('/logout', [
		'as'	=> 'client_logout',
		'uses'	=> 'UserController@logout'
	]);
});