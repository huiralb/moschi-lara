<?php namespace moschi\Http\Controllers;
use Illuminate\Contracts\Auth\Guard;

use moschi\Maincategories;
use moschi\Categories;
use moschi\Products;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
      $maincategories = Maincategories::get();
		$products = Products::take(4)->get();
		return view('welcome', compact('maincategories', 'products'));
	}

}
