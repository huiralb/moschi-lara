<?php namespace moschi;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {
	protected $table = 'products';

	protected $fillable = [
		'user_id',
		'category_id',
		'name',
		'description'
	];

   public function image()
   {
      return ProductImage::where('primary', 1)
                           ->where('product_id', $this->id)
                           ->get();
   }

}
