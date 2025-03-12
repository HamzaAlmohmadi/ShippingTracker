<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    
    protected $fillable = [
        'tracking_number',
        'weight',
        'notes',
        'from_country_id',
        'from_city_id',
        'from_address',
        'to_country_id',
        'to_city_id',
        'to_address',
        'sender_id',
        'receiver_id',
        'driver_id',
        'status',
    ];


    



    public function  FromCountry()
    {
        return $this->belongsTo(Country::class,'from_country_id');
    }

    public function  FromCity()
    {
        return $this->belongsTo(City::class,'from_city_id');
    }

    public function  ToCountry()
    {
        return $this->belongsTo(Country::class,'to_country_id');
    }

    public function  ToCity()
    {
        return $this->belongsTo(City::class,'to_city_id');
    }


    public function  Sender()
    {
        return $this->belongsTo(Sender::class,'sender_id');
    }

    public function  Receiver()
    {
        return $this->belongsTo(Receiver::class,'receiver_id');
    }

    public function Driver()
    {
        return $this->belongsTo(Driver::class,'driver_id');
    }

    public static function generateTrackingNumber()
    {
        // توليد رقم عشوائي مزج بالتاريخ والوقت
        $randomNumber = mt_rand(1000, 9999);
        return 'SHIP-' . date('Ymd') . '-' . $randomNumber;
    }
}


