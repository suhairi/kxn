<?php

use Illuminate\Database\Seeder;
use App\Supplier;
// use Faker\Generator as Faker;
use App\Repair;
use App\Car;

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

        for($i=0; $i<25; $i++) {

            Car::create([
                'owner'     => $faker->name,
                'plateNo'   => $faker->randomElement(['K', 'P', 'R', 'C', 'A', 'B']) . 
        $faker->randomElement(['A', 'B', 'B', 'D', 'E', 'F', 'G']) . 
        $faker->randomElement(['N', 'M', 'A', 'P', 'Q', 'T', 'C']) . rand(50, 9000),
                'model'     => $faker->randomElement([
                                'Honda Civic',
                                'Proton Iswara',
                                'Honda HRV',
                                'Honda CRV',
                                'Toyota Almera',
                                'Kia Forte',
                                'Volvo S60',
                                ]),
            ]);
        }

    }
}
