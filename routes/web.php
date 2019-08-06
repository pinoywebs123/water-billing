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

	Route::post('/login', [
		'as'	=> 'loginCheck',
		'uses'	=> 'AuthController@loginCheck'
	]);
});

Route::prefix('admin')->group(base_path('routes/admin.php'));

Route::prefix('billing')->group(base_path('routes/billing.php'));

Route::prefix('cashier')->group(base_path('routes/cashier.php'));

Route::prefix('client')->group(base_path('routes/client.php'));

Route::prefix('maintenance')->group(base_path('routes/maintenance.php'));




