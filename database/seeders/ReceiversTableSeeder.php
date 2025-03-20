<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReceiversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // إضافة بيانات المستلمين
                DB::table('receivers')->insert([
                    [
                        'name' => 'Receiver 1',
                        'phone' => '1111111111',
                        'address' => '123 Main St, City A',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

                ]);
    }
}





