<?php namespace moschi\Http\Controllers;

use moschi\Http\Controllers\Controller;

use moschi\ProductImage;
use Request;
// own
use moschi\Products;
use moschi\Categories;
use Auth;
use Input;
use Validator;
use Session;
use Image;
use Redirect;
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
			return "show all product";
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = Auth::user()->id;
      $categories = Categories::orderBy('name')->get();

      return view('item.create', compact('user', 'categories'));
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
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request)
   {
      $input = Request::all();

      $isImageOnly = $this->isOnlyImage($input['imageOnly']);

      if (!$isImageOnly) { // Reguler Store data

         $data = new Products;
         $data->name = $input['name'];
         $data->user_id = $input['user_id'];
         $data->category_id = $input['category_id'];
         $data->description = $input['description'];
         $data->save();
         $id = $data->id;
         $primary = 1;
         $redirect = redirect('/user');
      }
      else{ // Upload Image Only
         $id = $input['product_id'];
         $primary = 0;
         $redirect = redirect()->back();
      }

      $files = Request::file('images');
      $count = 1;
      foreach ($files as $file) {
         $ext = $this->getExtension($file);
         $file_name = $this->filename($id) . $ext;
         Image::make($file)->save('public/images/products/' . $file_name);
         Image::make($file)->resize(350, 263)->save('public/images/products/m/' . $file_name);
         Image::make($file)->resize(155, 116)->save('public/images/products/s/' . $file_name);

         // Record data to ProductImage table
         $image = new ProductImage;
         $image->name = $file_name;
         $image->product_id = $id;
         if ($count == 1) {
            $image->primary = $primary;
         }
         $image->save();

         $count = $count + 1;
      }

      return $redirect;

   }

   /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	   $product = Products::find($id);

	   $categories = Categories::select('id', 'name')->orderBy('name')->get();

      return view('item.edit', compact('product', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
      $product = Products::findOrFail($id);

      $validator = Validator::make($data = Request::all(), Products::$rules);

      if ($validator->fails()) {
         return Redirect::back()->withErrors($validator)->withInput();
      }

      $product->update($data);

      return Redirect::to('/user');

      $files = Request::file('images');

   }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	   // Delete the product record.
	   // under table relationship, this delete product_images too

	   $product = new Products;

      if ( $product->onDelete($id) ) {

         return Redirect::to('/user');

      }

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

   protected function isOnlyImage($request)
   {
      if ($request == 1){
         return true;
      }

      return false;
   }



}
