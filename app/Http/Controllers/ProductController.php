<?php namespace moschi\Http\Controllers;

use moschi\Http\Controllers\Controller;

use moschi\ProductImage;
use Request;
// own
use moschi\Products;
use Auth;
use Input;
use Validator;
use Session;
use Image;
class ProductController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			return dd(Products::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = Auth::user()->id;
		return view('item.create', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$files = Input::file('images');

      $data = new Products;
      $data->name = $input['name'];
      $data->user_id = $input['user_id'];
      $data->category_id = 1;
      $data->description = $input['description'];
      $data->save();

      $product_id = $data->id;

      $count = 1;
      foreach ($files as $file) {
         $ext = $this->getExtension($file);
         $file_name = $this->filename(Input::get('name')) . $ext;
         Image::make($file)->save('public/images/products/' . $file_name);
         Image::make($file)->resize(100, 100)->save('public/images/products/m/' . $file_name);

         // insert data image to table
         $image = new ProductImage;
         $image->name = $file_name;
         $image->product_id = $product_id;
         if ($count == 1) {
            $image->primary = 1;
         }
         $image->save();

         $count = $count + 1;
      }
      // insert data to table
//      Products::create($input);


//		Products::create($input);
		return redirect('user/'.Auth::user()->id);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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

   /*
    * enter filename
    *
    * @param string $request
    * @return string
    */
   protected function filename($request)
   {
      if (empty($request)) {
         return false;
      }
      return str_slug($request) . '-' . date('Ymd') . str_random(10);
   }

   /*
    * Get file extension
    *
    *@param string $file
    *@return string
    */
   protected function getExtension($file)
   {
      $mime = Image::make($file)->mime();
      if ($mime == 'image/jpeg') {
         return '.jpg';
      }
      return '.' . str_replace('image/', '', $mime);
   }
}
