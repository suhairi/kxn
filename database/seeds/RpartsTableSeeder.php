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
        	'plateNo'	=> 'PHQ2876',
        	'model'		=> 'Proton Iswara'
        ]);
    }
}
