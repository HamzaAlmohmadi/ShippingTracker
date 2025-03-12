<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Receiver;
use App\Models\Sender;
use App\Models\Shipment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddShipment extends Component
{

    protected $listeners = ['deleteShipment']; 
    public $shipment;

    public $currentStep = 1;
    public $show_table = true;

//  بيانات المرسل والمستلم

    public $sender_name, $sender_phone, $sender_email, $sender_address;
    public $receiver_name, $receiver_phone, $receiver_address;

    public $from_country_id, $from_city_id, $from_address;
    public $to_country_id, $to_city_id, $to_address;

    public $weight;
    public $notes;
    public $countries;
    public $cities_from = [];
    public $cities_to = [];
    public $catchError ;


    public function mount()
    {
        $this->countries = Country::all();
    }



    public function render()
    {
        return view('livewire.add-shipment',[
            'shipments' =>Shipment::all(),
        ]);
    }


    public function updatedFromCountryId($countryId)
    {
        $this->cities_from = $countryId ? City::where('country_id', $countryId)->get() : [];
    }
    
    public function updatedToCountryId($countryId)
    {
        $this->cities_to = $countryId ? City::where('country_id', $countryId)->get() : [];
    }
    



    public function firstStepSubmit()
    {
        $this->validate([
            'sender_name' => 'required|string',
            'sender_phone' => 'required|string',
            'sender_email' => 'nullable|email',
            'sender_address' => 'required|string',
            'receiver_name' => 'required|string',
            'receiver_phone' => 'required|string',
            'receiver_address' => 'required|string',
        ]);



        $this->currentStep = 2;
    }



    public function secondStepSubmit()
    {

        $this->validate([
            'from_country_id' => 'required|exists:countries,id',
            'from_city_id' => 'required|exists:cities,id',
            'from_address' => 'required|string',
            'to_country_id' => 'required|exists:countries,id',
            'to_city_id' => 'required|exists:cities,id',
            'to_address' => 'required|string',
            'weight' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

   

        $this->currentStep = 3;
    }



    public function saveShipment()
    {

        DB::beginTransaction();
        try 
        {
        $sender = Sender::create([
                'name'       =>$this->sender_name,
                'phone'      =>$this->sender_phone,
                'email'      =>$this->sender_email,
                'address'    =>$this->sender_address
            ]);
    
        $receiver= Receiver::create([
                'name'     =>$this->receiver_name,
                'phone'    =>$this->receiver_phone,
                // 'email'     =>$this->sender_email,
                'address'  =>$this->receiver_address
            ]);
    
        
        Shipment::create([
                'tracking_number'  =>Shipment::generateTrackingNumber(),
    
                'weight'           => $this->weight,
                'notes'            => $this->notes,
                'from_country_id'  => $this->from_country_id,
                'from_city_id'     => $this->from_city_id,
                'from_address'     => $this->from_address,
                'to_country_id'    => $this->to_country_id,
                'to_city_id'       => $this->to_city_id,
                'to_address'       => $this->to_address,
                ////
                'sender_id'        =>$sender->id,
                'receiver_id'      =>$receiver->id,
                'driver_id'         => 1,
                'status'           =>'جديدة ',
            ]);
            
            toastr()->success('تم حفظ البيانات بنجاح.');
            $this->reset();
            $this->clearForm();
            $this->countries = Country::all();
            DB::commit();

        }

        catch (\Exception $e) {
            DB::rollback();
            $this->catchError = $e->getMessage();
        }

        
    }
    
    
    public function edit($shipmentId)
    {
        DB::beginTransaction();
    
        try 
        {
            $shipment = Shipment::findOrFail($shipmentId);
            $sender = Sender::findOrFail($shipment->sender_id);
            $receiver = Receiver::findOrFail($shipment->receiver_id);
    
            $sender->update([
                'name' => $this->sender_name,
                'phone' => $this->sender_phone,
                'email' => $this->sender_email,
                'address' => $this->sender_address,
            ]);
    
            $receiver->update([
                'name' => $this->receiver_name,
                'phone' => $this->receiver_phone,
                'address' => $this->receiver_address,
            ]);
    
            $shipment->update([
                'weight' => $this->weight,
                'notes' => $this->notes,
                'from_country_id' => $this->from_country_id,
                'from_city_id' => $this->from_city_id,
                'from_address' => $this->from_address,
                'to_country_id' => $this->to_country_id,
                'to_city_id' => $this->to_city_id,
                'to_address' => $this->to_address,
                'status' => 'قيد التوصيل', // يمكنك تغيير الحالة حسب الحاجة
                'driver_id' => 1, // يمكنك تغيير قيمة الشاحنة حسب الحاجة
            ]);
    
            session()->flash('message', 'تم تحديث البيانات بنجاح!');
            $this->reset();
            $this->clearForm();
            DB::commit();
        } 
        catch (\Exception $e) 
        {
            DB::rollback();
            $this->catchError = $e->getMessage();
        }
    }
    
    

    public function deleteShipment($shipmentId)
    {
        try {
            Shipment::findOrFail($shipmentId)->delete();
            session()->flash('message', 'تم حذف الشحنة بنجاح!');
            // تحديث القائمة
            $this->shipment = Shipment::all();
        } catch (\Exception $e) {
            session()->flash('error', 'حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    }
    
    



    public function show_form_add()
    {
        $this->show_table = false;
    }



    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function clearForm()
    {
        $this->reset([
            'sender_name', 'sender_phone', 'sender_email', 'sender_address',
            'receiver_name', 'receiver_phone', 'receiver_address',
            'from_country_id', 'from_city_id', 'from_address',
            'to_country_id', 'to_city_id', 'to_address',
            'weight', 'notes',
        ]);
    }
    
    

}

