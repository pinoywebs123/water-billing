<?php 

Route::group(['namespace'=> 'Client', 'middleware'=> 'client_check'], function()
{
	Route::get('/home', [
		'as'	=> 'client_home',
		'uses'	=> 'UserController@home'
    ]);
    
    Route::get('/change_pass', [
		'as'	=> 'client_change_pass',
		'uses'	=> 'UserController@change_pass'
    ]);

    Route::post('/change_pass/store', [
		'as'	=> 'client_store_change_pass',
		'uses'	=> 'SettingController@change_pass_store'
    ]);
    
    Route::get('/profile', [
		'as'	=> 'client_profile',
		'uses'	=> 'UserController@profile'
    ]);

    Route::post('/profile/update_profile_pic', [
		'as'	=> 'client_profile_pic',
		'uses'	=> 'ProfileController@profile_update_pic'
    ]);

    Route::post('/profile/store', [
		'as'	=> 'client_store_profile',
		'uses'	=> 'ProfileController@profile_store'
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

		Route::post('/request_pending_store', [
			'as'	=> 'client_request_pending_store',
			'uses'	=> 'RequestController@request_pending_store'
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