<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
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
            'notes' => 'nullable|string', // تأكد من وجود هذا الحقل
        ];
    }




    public function messages(): array
    {
        return [
            // بيانات المرسل
            'sender_name.required' => 'حقل اسم المرسل مطلوب.',
            'sender_name.string' => 'حقل اسم المرسل يجب أن يكون نصًا.',
            'sender_phone.required' => 'حقل هاتف المرسل مطلوب.',
            'sender_phone.string' => 'حقل هاتف المرسل يجب أن يكون نصًا.',
            'sender_email.email' => 'حقل البريد الإلكتروني للمرسل يجب أن يكون بريدًا إلكترونيًا صالحًا.',
            'sender_district.required' => 'حقل الحي للمرسل مطلوب.',
            'sender_district.string' => 'حقل الحي للمرسل يجب أن يكون نصًا.',
            'sender_street.required' => 'حقل الشارع للمرسل مطلوب.',
            'sender_street.string' => 'حقل الشارع للمرسل يجب أن يكون نصًا.',
            'sender_building.required' => 'حقل المبنى للمرسل مطلوب.',
            'sender_building.string' => 'حقل المبنى للمرسل يجب أن يكون نصًا.',
            'sender_floor.string' => 'حقل الطابق للمرسل يجب أن يكون نصًا.',
            'sender_additional_info.string' => 'حقل المعلومات الإضافية للمرسل يجب أن يكون نصًا.',
    
            // بيانات المستقبل
            'receiver_name.required' => 'حقل اسم المستقبل مطلوب.',
            'receiver_name.string' => 'حقل اسم المستقبل يجب أن يكون نصًا.',
            'receiver_phone.required' => 'حقل هاتف المستقبل مطلوب.',
            'receiver_phone.string' => 'حقل هاتف المستقبل يجب أن يكون نصًا.',
            'receiver_district.required' => 'حقل الحي للمستقبل مطلوب.',
            'receiver_district.string' => 'حقل الحي للمستقبل يجب أن يكون نصًا.',
            'receiver_street.required' => 'حقل الشارع للمستقبل مطلوب.',
            'receiver_street.string' => 'حقل الشارع للمستقبل يجب أن يكون نصًا.',
            'receiver_building.required' => 'حقل المبنى للمستقبل مطلوب.',
            'receiver_building.string' => 'حقل المبنى للمستقبل يجب أن يكون نصًا.',
            'receiver_floor.string' => 'حقل الطابق للمستقبل يجب أن يكون نصًا.',
            'receiver_additional_info.string' => 'حقل المعلومات الإضافية للمستقبل يجب أن يكون نصًا.',
    
            // بيانات الشحنة
            'from_country_id.required' => 'حقل دولة المرسل مطلوب.',
            'from_country_id.exists' => 'دولة المرسل المحددة غير صالحة.',
            'from_city_id.required' => 'حقل مدينة المرسل مطلوب.',
            'from_city_id.exists' => 'مدينة المرسل المحددة غير صالحة.',
            'to_country_id.required' => 'حقل دولة المستقبل مطلوب.',
            'to_country_id.exists' => 'دولة المستقبل المحددة غير صالحة.',
            'to_city_id.required' => 'حقل مدينة المستقبل مطلوب.',
            'to_city_id.exists' => 'مدينة المستقبل المحددة غير صالحة.',
            'weight.numeric' => 'حقل الوزن يجب أن يكون رقمًا.',
            'package_type.required' => 'حقل نوع الطرد مطلوب.',
            'package_type.string' => 'حقل نوع الطرد يجب أن يكون نصًا.',
            'package_type.in' => 'نوع الطرد يجب أن يكون إما "صندوق" أو "ظرف".',
            'length.numeric' => 'حقل الطول يجب أن يكون رقمًا.',
            'width.numeric' => 'حقل العرض يجب أن يكون رقمًا.',
            'thickness.numeric' => 'حقل السماكة يجب أن يكون رقمًا.',
            'payment_status.string' => 'حقل حالة الدفع يجب أن يكون نصًا.',
            'payment_method.string' => 'حقل طريقة الدفع يجب أن يكون نصًا.',
        ];
    }
}













