<?php namespace moschi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;


class ProductImage extends Model {

   protected $table = 'product_images';

   protected $fillable = [
      'name',
      'product_id'
   ];

   public function scopeOfPrimary($query, $id, $value = null)
   {
      if (is_null($value)) {
         return $query->whereProduct_id($id);
      }
         return $query->whereProduct_id($id)->wherePrimary($value);
   }


   public function product()
   {
      return $this->belongsTo('moschi\Products');
   }

   public function onDelete($id, $product_id, $deleteFile = true)
   {
      if ($deleteFile) {
         // Delete image file first
         $this->deleteFileImage($id);
      }

      // Delete Record
      $image = ProductImage::find($id);
      $image->delete();

      // if the primary of image value 1
      // set primary to 1 of other file exist
      if ($image->primary == 1) {
         $image = ProductImage::ofPrimary($product_id)->first();
         $image->primary = 1;
         $image->save();
      }
   }



   /*
    * Delete image File on the storage
    */
   public function deleteFileImage($id)
   {
      // Get name of file from record
      $file = ProductImage::where('id', $id)->select('name')->first();
      $return = [];
      $return[] = public_path() . '/images/products/' . $file->name;
      $return[] = public_path() . '/images/products/m/' . $file->name;
      $return[] = public_path() . '/images/products/s/' . $file->name;
      // Delete file
      $filesystem = new Filesystem;
      $filesystem->delete($return);

   }


}
