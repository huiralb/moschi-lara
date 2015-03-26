<?php namespace moschi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

class Products extends Model {
	protected $table = 'products';

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|between:3,255',
		'description' => 'required',
		'category_id' => 'integer',
	];

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

	public function images()
	{
		return ProductImage::where('product_id', $this->id)->get();
	}

	/*
	 * Delete product selected record from database
	 *
	 * require table set onDelete to CASCADE
	 */
	public function onDelete($id)
	{
		// Delete image file first
		if ($this->deleteImages($id))
		{
			Products::find($id)->delete();
			return true;
		}
	}

	/*
	 * Delete image File on the storage
	 */
	public function deleteImages($id)
	{
		// Get name of file from record
		$files = ProductImage::where('product_id', $id)->select('name')->get();

		$files = array_pluck($files, 'name');
		$return = [];

		foreach ($files as $file) {
			$return[] = public_path() . '/images/products/' . $file;
			$return[] = public_path() . '/images/products/m/' . $file;
			$return[] = public_path() . '/images/products/s/' . $file;
		}

		$filesystem = new Filesystem;
		if ($filesystem->delete($return)) return true;

	}

}
