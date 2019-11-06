<?php

Route::get('/', function () 
{
    return redirect()->route('login');
});

Route::group(['prefix'=> 'auth'], function()
{
	Route::get('/login', [
		'as' 	=> 'login',
		'uses'	=> 'AuthController@login'
    ]);
    
    Route::get('/register', [
		'as' 	=> 'register',
		'uses'	=> 'AuthController@register'
    ]);
    
    Route::post('/register/store', [
		'as' 	=> 'store_profile_user',
		'uses'	=> 'RegisterController@register_store'
	]);

	Route::post('/login', [
		'as'	=> 'loginCheck',
		'uses'	=> 'AuthController@loginCheck'
	]);
	
	Route::get('/check_deadline', [
	    'as'	=> 'loginCheck',
		'uses'	=> 'AuthController@cron_deadline_email'
	]);
});



//Route::prefix('billing')->group(base_path('routes/billing.php'));

//Route::prefix('cashier')->group(base_path('routes/cashier.php'));

//Route::prefix('client')->group(base_path('routes/client.php'));

//Route::prefix('maintenance')->group(base_path('routes/maintenance.php'));




