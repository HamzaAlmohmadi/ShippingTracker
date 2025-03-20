<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ShipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     
     public function run()
     {
         $faker = Faker::create('ar_SA'); // استخدام Faker باللغة العربية
 
         $statuses = [
             'pending',
             'received',
             'in_transit',
             'customs_clearance',
             'customs_held',
             'out_for_delivery',
             'at_distribution_center',
             'delivered',
             'canceled',
         ];
 
         for ($i = 0; $i < 15; $i++) {
             $packageType = $faker->randomElement(['صندوق', 'ظرف']);
             $dimensions = $this->calculateDimensions($packageType, $faker);
 
             Shipment::create([
                // 'tracking_number' => 'SHIP-' . now()->format('Ymd') . '-' . $faker->unique()->numberBetween(1000, 9999),
                'tracking_number' => $faker->unique()->numberBetween(1000000000, 9999999999),
                 'status' => $faker->randomElement($statuses),
                 'weight' => $faker->numberBetween(1, 20),
                 'notes' => $faker->sentence,
                 'user_id' => 1, // المستخدم ثابت
                 'from_country_id' => $faker->numberBetween(1, 3),
                 'from_city_id' => $faker->numberBetween(1, 3),
                 'to_country_id' => $faker->numberBetween(1, 3),
                 'to_city_id' => $faker->numberBetween(1, 3),
                 'sender_data' => json_encode([
                     'name' => $faker->name,
                     'phone' => $faker->phoneNumber,
                     'email' => $faker->email,
                     'district' => $faker->city,
                     'street' => $faker->streetName,
                     'building' => $faker->buildingNumber,
                     'floor' => $faker->randomElement([null, $faker->numberBetween(1, 10)]),
                     'additional_info' => $faker->sentence,
                 ]),
                 'receiver_data' => json_encode([
                     'name' => $faker->name,
                     'phone' => $faker->phoneNumber,
                     'district' => $faker->city,
                     'street' => $faker->streetName,
                     'building' => $faker->buildingNumber,
                     'floor' => $faker->randomElement([null, $faker->numberBetween(1, 10)]),
                     'additional_info' => $faker->sentence,
                 ]),
                 'driver_id' => 1, // السائق ثابت
                 'shipping_date' => Carbon::now(),
                 'estimated_delivery_date' => Carbon::now()->addDays($faker->numberBetween(1, 10)),
                 'actual_delivery_date' => $faker->randomElement([null, Carbon::now()->addDays($faker->numberBetween(1, 10))]),
                 'package_type' => $packageType,
                 'dimensions' => json_encode($dimensions),
                 'payment_status' => $faker->randomElement(['مدفوع', 'غير مدفوع']),
                 'payment_method' => $faker->randomElement(['بطاقة ائتمان', 'تحويل بنكي', 'نقدي']),
             ]);
         }
     }
 
     private function calculateDimensions(string $packageType, $faker): array
     {
         if ($packageType === 'صندوق') {
             return [
                 'type' => 'صندوق',
                 'length' => $faker->numberBetween(10, 100),
                 'width' => $faker->numberBetween(10, 100),
                 'price' => $faker->numberBetween(100, 1000),
             ];
         }
 
         if ($packageType === 'ظرف') {
             return [
                 'type' => 'ظرف',
                 'weight' => $faker->numberBetween(1, 10),
                 'thickness' => $faker->numberBetween(1, 5),
                 'price' => $faker->numberBetween(50, 500),
             ];
         }
 
         return [];
     }


}




