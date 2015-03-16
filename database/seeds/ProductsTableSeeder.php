<?php 
use moschi\Products;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class ProductsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('products')->delete();

        Products::create([
        	'name' => 'MacBook',
        	'user_id' => 1,
        	'category_id' => 1,
        	'description' => '&lt;div&gt;
 	&lt;p&gt;
 		&lt;b&gt;Intel Core 2 Duo processor&lt;/b&gt;&lt;/p&gt;
 	&lt;p&gt;
 		Powered by an Intel Core 2 Duo processor at speeds up to 2.16GHz, the new MacBook is the fastest ever.&lt;/p&gt;
 	&lt;p&gt;
 		&lt;b&gt;1GB memory, larger hard drives&lt;/b&gt;&lt;/p&gt;
 	&lt;p&gt;
 		The new MacBook now comes with 1GB of memory standard and larger hard drives for the entire line perfect for running more of your favorite applications and storing growing media collections.&lt;/p&gt;
 	&lt;p&gt;
 		&lt;b&gt;Sleek, 1.08-inch-thin design&lt;/b&gt;&lt;/p&gt;
 	&lt;p&gt;
 		MacBook makes it easy to hit the road thanks to its tough polycarbonate case, built-in wireless technologies, and innovative MagSafe Power Adapter that releases automatically if someone accidentally trips on the cord.&lt;/p&gt;
 	&lt;p&gt;
 		&lt;b&gt;Built-in iSight camera&lt;/b&gt;&lt;/p&gt;
 	&lt;p&gt;
 		Right out of the box, you can have a video chat with friends or family,2 record a video at your desk, or take fun pictures with Photo Booth&lt;/p&gt;
 &lt;/div&gt;
 '
        	]);
    }

}