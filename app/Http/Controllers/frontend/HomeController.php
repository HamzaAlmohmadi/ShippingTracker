<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }



    public function about()
    {
        return view('frontend.pages.about');
    }

    public function services()
    {
        return view('frontend.pages.services');
    }



    public function pricing()
    {
        return view('frontend.pages.pricing');
    }


    public function contact()
    {
        return view('frontend.pages.contact');
    }


    public function get_a_quote()
    {
        return view('frontend.pages.get-a-quote');
    }

    public function testimonials()
    {
        return view('frontend.home.testimonials');
    }

    public function hero()
    {
        return view('frontend.home.hero');
    }

    public function faq()
    {
        return view('frontend.home.faq');
    }


    public function track(Request $request)
    {
     
       
        $shipment = null;

        if ($request->has('tracker')) {
            $shipment = Shipment::where('tracking_number', $request->tracker)->first();
        }
        
        $tracker =$request->tracker;

        return view('frontend.pages.shipment-track', compact('shipment','tracker'));
    }


}
