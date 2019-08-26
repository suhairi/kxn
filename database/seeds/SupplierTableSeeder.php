<?php

use Illuminate\Database\Seeder;
use App\Supplier;
// use Faker\Generator as Faker;
use App\Repair;
use App\Car;
use App\Dorder;

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
	            'name' => $faker->unique()->randomElement(['Cemerlang ', 'Maju Jaya ', 'AZRB ', 'Elsoft ', 'Scientex ', 'Gading ', 'Lee Hin ', 'Scicom ', 'Ah Sin ', 'GHL ', 'Heveaboard ', 'Uchiha ', 'Naruto ', 'Apex ', 'Wah Lee ', 'QL ', 'Muthusamy ', 'Perkasa ', 'Steady Wheel ', 'Avajaya ', 'Lan Hoe ', 'Guan Hoe ']) . ' ' . $faker->randomElement(['Trading', 'Sdn. Bhd.', 'Enterprise', 'Resources'])
	        ]);
	    }

        Supplier::create([
            'name'  => 'Suhairi Trading'
        ]);


        $customers = ['Suhairi', 'Fadzil', 'Mat Yan', 'MBAS', 'Nassarudin', 'Ali', 'Abu', 'Saad',
                        'Said', 'Naijb', 'Abdullah', 'Mohd', 'Samy Vellu', 'Siti Nurhaliza',
                        'Amy', 'Ijat', 'Musa', 'Sayuti', 'Rozaini', 'Ah Siang', 'Akib', 
                        'Abdul Hamid', 'Halim', 'Zulkifli', 'Zulkiflee', 'Daud', 'Sulaiman',
                        'Adam', 'Idris', 'Nuh', 'Hud', 'Salleh', 'Ibrahim', 'Lut', 'Ismail',
                        'Ishak', 'Yaakob', 'Yusuf', 'Ayub', 'Isa', 'Illyas', 'Ilyasa',
                        'sumayyah', 'amran', 'imran'];
        for($i=0; $i<25; $i++) {

            Car::create([
                'owner'     => $faker->unique()->randomElement($customers),
                'address'   => 'No. ' . rand(20,250) . ' ' . $faker->randomElement(['Taman ', 'Kg. ']) . $faker->randomElement(['Kemajuan', 'Wira', 'Bunga Raya', 'Inang', 'Inai', 'Gunung Sali', 'Seri Impian', 'Seri Gading', 'Putra']) . ', ' . $faker->randomElement(['Jalan ', 'Lorong ']) . $faker->randomElement(['Alor Melintang', 'Alor Gajus', 'Putra', 'Sultanah', 'Sultanah Tambahan', 'Merdeka']) . ', ' . $faker->randomElement(['05000 ', '05150 ', '05300 ', '05460 ', '05350 ', '05250 ', '05600 ', '06000 ', '06570 ', '05990 ']) . $faker->randomElement(['Alor Setar', 'Sungai Petani', 'Yan', 'Kuala Kedah', 'Simpang Kuala']) . ', ' . 'Kedah Darul Aman.', 
                'plateNo'   => $faker->randomElement(['K', 'P', 'R', 'C', 'A', 'B']) . 
        $faker->randomElement(['A', 'B', 'B', 'D', 'E', 'F', 'G']) . 
        $faker->randomElement(['N', 'M', 'A', 'P', 'Q', 'T', 'C']) . rand(50, 9000),
                'model'     => $faker->randomElement([                                
                                'Proton Iswara', 'Proton Saga', 'Proton Preve', 'Proton Perdana', 'Proton x70', 'Proton x50',
                                'Honda HRV', 'Honda CRV', 'Honda City', 'Honda BRV', 'Honda Civic', 'Honda Civic',
                                'Toyota Vios', 'Toyota Avanza', 'Toyota Rush', 'Toyota Innova',
                                'Kia Forte', 'Kia Sportage', 'Optima GT', 'Kia Sorento', 'Grand Carnival',
                                'Volvo S60 T6', 'Volvo V40 T5', 'Volvo S90 T8', 'Volvo XC60 T8',
                                
                                ]),
            ]);
        }



    }
}
