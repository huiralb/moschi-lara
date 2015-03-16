<?php 
use moschi\Maincategories;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class MainCategoriesTableSeeder extends Seeder {

  public function run()
  {
    DB::table('maincategories')->delete();

    Maincategories::create(['name' => 'agriculture & food']);
    Maincategories::create(['name' => 'apparel,textiles & accessories']);
    Maincategories::create(['name' => 'auto & transportation']);
    Maincategories::create(['name' => 'bags, shoes & accessories']);
    Maincategories::create(['name' => 'electronics']);
    Maincategories::create(['name' => 'electrical equipment, components & telecoms']);
    Maincategories::create(['name' => 'gifts, sports & toys']);
    Maincategories::create(['name' => 'health & beauty']);
    Maincategories::create(['name' => 'home, lights & construction']);
    Maincategories::create(['name' => 'machinery, industrial parts & tools']);
    Maincategories::create(['name' => 'metallurgy, chemicals, rubber & plastics']);
    Maincategories::create(['name' => 'packaging, advertising & office']);
	}

}