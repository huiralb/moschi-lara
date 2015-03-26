<?php namespace moschi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;


class ProductImage extends Model {

   protected $table = 'product_images';

   protected $fillable = [
      'name',
      'product_id'
   ];

   public function product()
   {
      return $this->belongsTo('moschi\Products');
   }

   public function onDelete($id)
   {
      // Delete image file first
      $this->deleteImage($id);
      ProductImage::find($id)->delete();
      return true;
   }



   /*
    * Delete image File on the storage
    */
   public function deleteImage($id)
   {
      // Get name of file from record
      $file = ProductImage::where('id', $id)->select('name')->first();
      $return = [];
      $return[] = public_path() . '/images/products/' . $file->name;
      $return[] = public_path() . '/images/products/m/' . $file->name;
      $return[] = public_path() . '/images/products/s/' . $file->name;
      $filesystem = new Filesystem;
      $filesystem->delete($return);

   }

}
