<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('trucks')->insert([
            [
                'name' => 'Truck 1',
                'truck_number' => '123-ABC',
                'capacity' => '1000',
                'status' => 'active',
            ],
            [
                'name' => 'Truck 2',
                'truck_number' => '456-DEF',
                'capacity' => '1500',
                'status' => 'inactive',
            ],
            [
                'name' => 'Truck 3',
                'truck_number' => '789-GHI',
                'capacity' => '2000',
                'status' => 'maintenance',
            ],
            // يمكنك إضافة المزيد من الشاحنات حسب الحاجة
        ]);
    }
}



// <?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

// class TruckSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         DB::table('trucks')->insert([
//             [
//                 'name' => 'Truck 1',
//                 'truck_number' => '123-ABC',
//                 'capacity' => '1000',
//                 'status' => 'active',
//             ],
//             [
//                 'name' => 'Truck 2',
//                 'truck_number' => '456-DEF',
//                 'capacity' => '1500',
//                 'status' => 'inactive',
//             ],
//             [
//                 'name' => 'Truck 3',
//                 'truck_number' => '789-GHI',
//                 'capacity' => '2000',
//                 'status' => 'maintenance',
//             ],
//             // يمكنك إضافة المزيد من الشاحنات حسب الحاجة
//         ]);
//     }
// }
