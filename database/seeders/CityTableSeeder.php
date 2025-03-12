<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->delete();

        $cities_list =['تعز','صنعاء','اب','عدن'];

        foreach( $cities_list as $city)
        {
            DB::table('cities')->insert([
            
                'name'       => $city,
                'country_id' =>  1,
            ]);
        }

        $cities =['الرياض ','جدة  ','المدينة المنورة'];

        foreach( $cities as $city)
        {
            DB::table('cities')->insert([
            
                'name'       => $city,
                'country_id' =>  2,
            ]);
        }

        $citie =['القاهرة ','شارع نيل ','طرابلس'];

        foreach( $citie as $city)
        {
            DB::table('cities')->insert([
            
                'name'       => $city,
                'country_id' =>  3,
            ]);
        }

    }
}
