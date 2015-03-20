<?php namespace moschi;

use Illuminate\Database\Eloquent\Model;

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

}
