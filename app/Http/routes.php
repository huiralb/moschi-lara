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

Route::group(['middleware' => 'auth'], function(){
	Route::resource('user', 'ProfileController',
		['except' => ['store', 'show', 'create']]
	);
	Route::resource('item', 'ProductController',
		['except' => ['index']]
	);
	Route::delete('item/image/{id}', 'ProductImageController@destroy');
});

Route::get('itm/{item}/{id}', function($item, $id){
	$item = Products::where('id', $id)->first();
	return view('item.detail', compact('item'));
});

// Category
Route::get('{name}_c{id}/', 'CateController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);




