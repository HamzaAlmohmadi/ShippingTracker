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
        // إضافة سواق واحد
        DB::table('drivers')->insert([
            'name' => 'Driver 1',
            'phone' => '1234567890',
            'email' => 'driver1@gmail.com',
            'password' => Hash::make('12345678'), // كلمة مرور مشفرة
            'address' => '123 Main St, City A',
            'license_number' => 'D123456',
            'truck_id' => 1, // يجب أن يكون هناك سجل في جدول trucks بالـ id = 1
            'user_id' => 2,   // يجب أن يكون هناك سجل في جدول users بالـ id = 2
            'status' => 'متاح',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}






