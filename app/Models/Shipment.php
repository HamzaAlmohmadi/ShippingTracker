<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    

    use HasFactory;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    // العلاقة مع جدول الدول (البلد المرسل)
    public function fromCountry()
    {
        return $this->belongsTo(Country::class, 'from_country_id');
    }

    // العلاقة مع جدول المدن (المدينة المرسلة)
    public function fromCity()
    {
        return $this->belongsTo(City::class, 'from_city_id');
    }

    // العلاقة مع جدول الدول (البلد المستقبل)
    public function toCountry()
    {
        return $this->belongsTo(Country::class, 'to_country_id');
    }

    // العلاقة مع جدول المدن (المدينة المستقبلة)
    public function toCity()
    {
        return $this->belongsTo(City::class, 'to_city_id');
    }

    // العلاقة مع جدول المرسلين
    public function sender()
    {
        return $this->belongsTo(Sender::class, 'sender_id');
    }

    // العلاقة مع جدول المستلمين
    public function receiver()
    {
        return $this->belongsTo(Receiver::class, 'receiver_id');
    }

    // العلاقة مع جدول السائقين
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    // دالة لتوليد رقم التتبع
    // public static function generateTrackingNumber()
    // {
    //     // توليد رقم عشوائي مزج بالتاريخ والوقت
    //     $randomNumber = mt_rand(1000, 9999);
    //     return 'SHIP-' . date('Ymd') . '-' . $randomNumber;
    // }

    public static function generateTrackingNumber()
    {
        do {
            // توليد رقم عشوائي مكون من 10 أرقام
            $trackingNumber = mt_rand(1000000000, 9999999999);
    
            // التحقق من عدم وجود الرقم مسبقًا في قاعدة البيانات
            $exists = Shipment::where('tracking_number', $trackingNumber)->exists();
        } while ($exists); // كرر العملية إذا كان الرقم موجودًا مسبقًا
    
        return $trackingNumber;
    }
}















