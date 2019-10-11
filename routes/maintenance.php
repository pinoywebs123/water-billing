<?php 

Route::group(['namespace'=> 'Maintenance'], function()
{
	Route::get('/home', [
		'as'	=> 'maintenance_home',
		'uses'	=> 'UserController@home'
    ]);

    //Clients
    
    Route::get('/client_records', [
		'as'	=> 'maintenance_client_records',
		'uses'	=> 'UserController@client_records'
    ]);
    
    Route::get('/pending_bills', [
		'as'	=> 'maintenance_pending_bills',
		'uses'	=> 'UserController@pending_bills'
	]);

	Route::get('/client-view-records/{id}',[
		'as'	=> 'maintenance_client_view_records',
		'uses'	=> 'UserController@maintenance_client_view_records'
	]);
    
    Route::get('/approved_bills', [
		'as'	=> 'maintenance_approved_bills',
		'uses'	=> 'UserController@approved_bills'
    ]);

    Route::post('/client-get-info',[
        'as'    => 'maintenance_get_client_info',
        'uses'  => 'UserController@maintenance_get_client_info'
    ]);

    Route::post('/client-waterbiller-update',[
        'as'    => 'maintenance_client_update_water',
        'uses'  => 'UserController@maintenance_client_update_water'
    ]);

    Route::post('/client-accept-job',[
    	'as'	=> 'maintenance_accpet_job',
    	'uses'	=> 'UserController@maintenance_accpet_job'
    ]);

    Route::post('/client-job-info/',[
    	'as'	=> 'maintenance_client_job_info',
    	'uses'	=> 'UserController@maintenance_client_job_info'
    ]);

    Route::get('/client-job-finished/{id}',[
    	'as'	=> 'maintenance_job_finished',
    	'uses'	=> 'UserController@maintenance_job_finished'
    ]);	


	Route::get('/logout', [
		'as'	=> 'maintenance_logout',
		'uses'	=> 'UserController@logout'
	]);
});