<?php
use moschi\Products;
use moschi\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

// Route::get('user', [
// 	'middleware' => 'auth',
// 	'uses' => 'ProfileController@index'
// ]);

Route::get('itm/{item}/{id}', function($item, $id){
	$item = Products::where('id', $id)->first();
	return view('item.detail')->with('item', $item);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

