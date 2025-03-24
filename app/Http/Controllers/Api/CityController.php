<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
        /**
     * جلب المدن حسب الدولة.
     */
    public function getCities(Request $request)
    {
        // التحقق من وجود country_id في الطلب
        $request->validate([
            'country_id' => 'required|exists:countries,id',
        ]);

        // جلب المدن حسب country_id
        $cities = City::where('country_id', $request->country_id)->get();

        // إرجاع النتيجة كـ JSON
        return response()->json([
            'success' => true,
            'data' => $cities,
        ]);
    }
}



