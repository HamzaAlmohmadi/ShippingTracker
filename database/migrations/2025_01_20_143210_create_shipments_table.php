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
            // $table->foreignId('courier_id')->references('id')->on('couriers')->onDelete('cascade'); // معرّف المورد (شركة الشحن)
            $table->string('status'); // حالة الشحنة
            $table->decimal('weight')->nullable();         // وزن الشحنة 
            $table->text('notes')->nullable();
            // عناوين مكان المرسل منه الشحنة 
            $table->foreignId('from_country_id')->constrained('countries')->cascadeOnDelete();
            $table->foreignId('from_city_id')->constrained('cities')->cascadeOnDelete();
            $table->string('from_address');

            // عناوين مكان  استلام الشحنة 
            $table->foreignId('to_country_id')->constrained('countries')->cascadeOnDelete();
            $table->foreignId('to_city_id')->constrained('cities')->cascadeOnDelete();
            $table->string('to_address');


            $table->foreignId('driver_id')->constrained('drivers');// ربط مع بيانات السائق   
            $table->foreignId('sender_id')->references('id')->on('senders')->onDelete('cascade');// ربط مع بيانات المرسل 
            $table->foreignId('receiver_id')->references('id')->on('receivers')->onDelete('cascade');// ربط مع بيانات المستلم 
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
