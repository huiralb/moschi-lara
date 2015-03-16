<?php namespace moschi;
use moschi\Categories;
use Illuminate\Database\Eloquent\Model;

class Maincategories extends Model {

	public $timestamps = false;

	public function categories()
	{
		return Categories::where('main_id', $this->id)
								->orderBy('name')
								->get();
	}

}
