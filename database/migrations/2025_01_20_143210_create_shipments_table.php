<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number')->unique(); // رقم الشحنة
            $table->string('status'); // حالة الشحنة
            $table->decimal('weight')->nullable(); // وزن الشحنة
            $table->string('notes')->nullable();
        
            // ربط الشحنة بالمستخدم
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        
            // عناوين مكان المرسل منه الشحنة
            $table->foreignId('from_country_id')->constrained('countries')->cascadeOnDelete();
            $table->foreignId('from_city_id')->constrained('cities')->cascadeOnDelete();
        
            // عناوين مكان استلام الشحنة
            $table->foreignId('to_country_id')->constrained('countries')->cascadeOnDelete();
            $table->foreignId('to_city_id')->constrained('cities')->cascadeOnDelete();
        
            // ربط مع بيانات السائق
            $table->foreignId('driver_id')->constrained('drivers');
        
            // بيانات المرسل مع الموقع
            $table->json('sender_data')->nullable(); // بيانات المرسل مع الموقع (مثل: {"name": "Ali", "phone": "0555555555", "email": "ali@example.com", "district": "حي النخيل", "street": "شارع الملك فهد", "building": "مبنى ١", "floor": "الطابق الثاني"})
        
            // بيانات المستقبل مع الموقع
            $table->json('receiver_data')->nullable(); // بيانات المستقبل مع الموقع (مثل: {"name": "Ahmed", "phone": "0555555555", "district": "حي النخيل", "street": "شارع الملك فهد", "building": "مبنى ١", "floor": "الطابق الثاني"})
        
            // الأعمدة الإضافية
            $table->date('shipping_date')->nullable(); // تاريخ الإرسال
            $table->date('estimated_delivery_date')->nullable(); // التاريخ المتوقع للتسليم
            $table->date('actual_delivery_date')->nullable(); // التاريخ الفعلي للتسليم
            $table->string('package_type')->nullable(); // نوع الطرد
            $table->json('dimensions')->nullable(); // أبعاد الشحنة (مثل: {"length": 10, "width": 5, "height": 2})
            $table->string('payment_status')->nullable(); // حالة الدفع (مثل: Paid, Unpaid)
            $table->string('payment_method')->nullable(); // طريقة الدفع (مثل: Credit Card, Bank Transfer)
            // $table->text('special_instructions')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};



