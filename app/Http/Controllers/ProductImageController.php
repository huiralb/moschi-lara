<?php namespace moschi\Http\Controllers;

use moschi\Http\Requests;
use moschi\Http\Controllers\Controller;

use Illuminate\Http\Request;
use moschi\ProductImage;

class ProductImageController extends Controller {

   public function destroy($id)
   {
      $image = new ProductImage;
      if($image->onDelete($id)) return redirect()->back();
   }

}
