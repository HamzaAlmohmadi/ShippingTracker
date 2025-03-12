<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable =['name','phone','address','email','license_number','truck_id','password','status','user_id'];
    


    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }


    // تعريف العلاقة مع الشحنات
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    // دالة لحساب عدد الشحنات الحالية
    public function currentShipmentsCount()
    {
        return $this->shipments()->where('status', '!=', 'مكتملة')->count();
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

