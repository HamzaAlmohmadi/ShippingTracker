<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        // يمكنك تغيير هذا بناءً على صلاحيات المستخدم
        return true;
    }

    public function rules(): array
    {
        return [
            // بيانات المرسل
            'sender_name' => 'required|string',
            'sender_phone' => 'required|string',
            'sender_email' => 'nullable|email',
            'sender_district' => 'required|string',
            'sender_street' => 'required|string',
            'sender_building' => 'required|string',
            'sender_floor' => 'nullable|string',
            'sender_additional_info' => 'nullable|string',

            // بيانات المستقبل
            'receiver_name' => 'required|string',
            'receiver_phone' => 'required|string',
            'receiver_district' => 'required|string',
            'receiver_street' => 'required|string',
            'receiver_building' => 'required|string',
            'receiver_floor' => 'nullable|string',
            'receiver_additional_info' => 'nullable|string',

            // بيانات الشحنة
            'from_country_id' => 'required|exists:countries,id',
            'from_city_id' => 'required|exists:cities,id',
            'to_country_id' => 'required|exists:countries,id',
            'to_city_id' => 'required|exists:cities,id',
            'weight' => 'nullable|numeric',
            'package_type' => 'required|string|in:صندوق,ظرف',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'thickness' => 'nullable|numeric',
            'payment_status' => 'nullable|string',
            'payment_method' => 'nullable|string',
        ];
    }


    public function messages(): array
    {
        return [
            'sender_name.required' => 'حقل اسم المرسل مطلوب.',
            'sender_phone.required' => 'حقل هاتف المرسل مطلوب.',
            'receiver_name.required' => 'حقل اسم المستقبل مطلوب.',
            'receiver_phone.required' => 'حقل هاتف المستقبل مطلوب.',
            // يمكنك إضافة المزيد من الرسائل المخصصة هنا
        ];
    }
}
