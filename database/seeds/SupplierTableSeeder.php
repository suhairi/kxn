<?php

use Illuminate\Database\Seeder;
use App\Supplier;
// use Faker\Generator as Faker;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

	    for($i = 0; $i < 15; $i++) {
	        Supplier::create([
	            'name' => $faker->name
	        ]);
	    }

        Supplier::create([
            'name'  => 'Suhairi Trading'
        ]);
    }
}
