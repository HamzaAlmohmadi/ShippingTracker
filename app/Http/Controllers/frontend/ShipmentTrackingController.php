<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentTrackingController extends Controller
{
    public function track(Request $request)
    {
        $shipment = null;

        if ($request->has('tracker')) {
            $shipment = Shipment::where('tracking_number', $request->tracker)->first();
        }
        

        return view('frontend.dashboard.pages.shipment-track', compact('shipment'));
    }

    
}
