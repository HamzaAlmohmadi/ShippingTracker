<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $drivers = [
        //     [
        //         'name' => 'سائق 1',
        //         'phone' => '1234567890',
        //         'email' => 'driver1@example.com',
        //         'email_verified_at' => Carbon::now(),
        //         'password' => Hash::make('password1'),
        //         'address' => 'العنوان 1',
        //         'license_number' => 'رخصة123',
        //         'status' => 'متاح',
        //         'truck_id' => 1,
        //     ],
        //     [
        //         'name' => 'سائق 2',
        //         'phone' => '2345678901',
        //         'email' => 'driver2@example.com',
        //         'email_verified_at' => Carbon::now(),
        //         'password' => Hash::make('password2'),
        //         'address' => 'العنوان 2',
        //         'license_number' => 'رخصة234',
        //         'status' => 'مشغول',
        //         'truck_id' => 2,
        //     ],
        //     [
        //         'name' => 'سائق 3',
        //         'phone' => '3456789012',
        //         'email' => 'driver3@example.com',
        //         'email_verified_at' => Carbon::now(),
        //         'password' => Hash::make('password3'),
        //         'address' => 'العنوان 3',
        //         'license_number' => 'رخصة345',
        //         'status' => 'في الطريق',
        //         'truck_id' => 3,
        //     ],
        //     // [
        //     //     'name' => 'سائق 4',
        //     //     'phone' => '4567890123',
        //     //     'email' => 'driver4@example.com',
        //     //     'email_verified_at' => Carbon::now(),
        //     //     'password' => Hash::make('password4'),
        //     //     'address' => 'العنوان 4',
        //     //     'license_number' => 'رخصة456',
        //     //     'status' => 'متاح',
        //     //     'truck_id' => 4,
        //     // ],
        //     // [
        //     //     'name' => 'سائق 5',
        //     //     'phone' => '5678901234',
        //     //     'email' => 'driver5@example.com',
        //     //     'email_verified_at' => Carbon::now(),
        //     //     'password' => Hash::make('password5'),
        //     //     'address' => 'العنوان 5',
        //     //     'license_number' => 'رخصة567',
        //     //     'status' => 'مشغول',
        //     //     'truck_id' => 5,
        //     // ],
        //     // [
        //     //     'name' => 'سائق 6',
        //     //     'phone' => '6789012345',
        //     //     'email' => 'driver6@example.com',
        //     //     'email_verified_at' => Carbon::now(),
        //     //     'password' => Hash::make('password6'),
        //     //     'address' => 'العنوان 6',
        //     //     'license_number' => 'رخصة678',
        //     //     'status' => 'في الطريق',
        //     //     'truck_id' => 6,
        //     // ],
        //     // [
        //     //     'name' => 'سائق 7',
        //     //     'phone' => '7890123456',
        //     //     'email' => 'driver7@example.com',
        //     //     'email_verified_at' => Carbon::now(),
        //     //     'password' => Hash::make('password7'),
        //     //     'address' => 'العنوان 7',
        //     //     'license_number' => 'رخصة789',
        //     //     'status' => 'متاح',
        //     //     'truck_id' => 7,
        //     // ],
        //     // [
        //     //     'name' => 'سائق 8',
        //     //     'phone' => '8901234567',
        //     //     'email' => 'driver8@example.com',
        //     //     'email_verified_at' => Carbon::now(),
        //     //     'password' => Hash::make('password8'),
        //     //     'address' => 'العنوان 8',
        //     //     'license_number' => 'رخصة890',
        //     //     'status' => 'مشغول',
        //     //     'truck_id' => 8,
        //     // ],
        //     // [
        //     //     'name' => 'سائق 9',
        //     //     'phone' => '9012345678',
        //     //     'email' => 'driver9@example.com',
        //     //     'email_verified_at' => Carbon::now(),
        //     //     'password' => Hash::make('password9'),
        //     //     'address' => 'العنوان 9',
        //     //     'license_number' => 'رخصة901',
        //     //     'status' => 'في الطريق',
        //     //     'truck_id' => 9,
        //     // ],
        //     // [
        //     //     'name' => 'سائق 10',
        //     //     'phone' => '0123456789',
        //     //     'email' => 'driver10@example.com',
        //     //     'email_verified_at' => Carbon::now(),
        //     //     'password' => Hash::make('password10'),
        //     //     'address' => 'العنوان 10',
        //     //     'license_number' => 'رخصة012',
        //     //     'status' => 'متاح',
        //     //     'truck_id' => 10,
        //     // ],
        // ];

        // DB::table('drivers')->insert($drivers);
    }
}


