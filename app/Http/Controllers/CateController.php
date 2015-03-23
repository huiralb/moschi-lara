<?php namespace moschi\Http\Controllers;

use moschi\Http\Requests;
use moschi\Http\Controllers\Controller;

use Illuminate\Http\Request;

use moschi\Categories;
use moschi\Products;

class CateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name, $id)
	{
		$cate = Categories::where('id', $id)->select('url')->first();
		if ($cate->url == $name) {
			$products = Products::where('category_id', $id)->get();
			return view('item.productsByCategory', compact('products'));
		}
		return "redirect 404";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
