<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // إضافة أدمن واحد
                DB::table('users')->insert([
                    'name' => 'Admin User',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('12345678'), // كلمة مرور مشفرة
                    'role' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        
                // إضافة سواق واحد
                DB::table('users')->insert([
                    'name' => 'Driver User',
                    'email' => 'driver@gmail.com',
                    'password' => Hash::make('12345678'), // كلمة مرور مشفرة
                    'role' => 'driver',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        
                // إضافة ثلاثة مستخدمين عاديين
                for ($i = 1; $i <= 3; $i++) {
                    DB::table('users')->insert([
                        'name' => 'User ' . $i,
                        'email' => 'user' . $i . '@gmail.com',
                        'password' => Hash::make('12345678'), // كلمة مرور مشفرة
                        'role' => 'user',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
    }
}





