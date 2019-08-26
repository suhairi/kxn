<?php

use Illuminate\Database\Seeder;
use App\Car;

class RpartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
        	'owner'		=> 'Suhairi Abdul Hamid',
            'address'   => 'No 17, Taman Seri Impian, Jalan Kuala Ketil, 08000 Sungai Petani, Kedah Darul Aman.',
        	'plateNo'	=> 'PHQ2876',
        	'model'		=> 'Proton Iswara'
        ]);
    }
}
