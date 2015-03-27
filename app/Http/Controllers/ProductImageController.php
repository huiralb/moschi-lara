<?php namespace moschi\Http\Controllers;

use moschi\Http\Requests;
use moschi\Http\Controllers\Controller;

use Illuminate\Http\Request;
use moschi\ProductImage;


class ProductImageController extends Controller {

   public function destroy(Request $request, $id)
   {
      $image = new ProductImage;

      $image->onDelete($id, $request->input('product-id'));

      return redirect()->back();
   }

   public function setPrimary(Request $request, $id)
   {
      // Reset primary to 0 of product image where product_id = $id
      ProductImage::whereProduct_id($request->input('product-id'))->update(['primary'=>0]);

      // Set primary the id of image to 1
      $update = ProductImage::whereId($id)->update(['primary'=>1]);

      // otherwise update success redirect to previous url
      if ($update) return redirect()->back();
   }

}
