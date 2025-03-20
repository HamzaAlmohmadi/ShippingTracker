<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('senders')->insert([
            [
                'name' => 'Sender 1',
                'phone' => '1234567890',
                'email' => 'sender1@example.com',
                'address' => '123 Main St, City A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'Sender 2',
            //     'phone' => '0987654321',
            //     'email' => 'sender2@example.com',
            //     'address' => '456 Elm St, City B',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'Sender 3',
            //     'phone' => '1122334455',
            //     'email' => 'sender3@example.com',
            //     'address' => '789 Oak St, City C',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}









