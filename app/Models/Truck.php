<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
        // مودل الشاحنات 
        use HasFactory;
        protected $fillable =['truck_number','capacity','status','name'];
    
    
        // public function shipments()
        // {
        //     return $this->hasMany(Shipment::class);
        // }
}
