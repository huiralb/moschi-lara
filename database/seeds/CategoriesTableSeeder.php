<?php 
use moschi\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        Categories::create([
        	'name' => 'furniture',
        	'main_id' => 9
        	]);
    }

}