<?php 

Route::group(['namespace'=> 'Maintenance'], function()
{
	Route::get('/home', [
		'as'	=> 'maintenance_home',
		'uses'	=> 'UserController@home'
	]);

	Route::get('/logout', [
		'as'	=> 'maintenance_logout',
		'uses'	=> 'UserController@logout'
	]);
});