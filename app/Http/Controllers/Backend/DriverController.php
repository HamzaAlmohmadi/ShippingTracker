<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DriverDataTable;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{

    public function index(DriverDataTable $dataTable)
    {
        return $dataTable->render('admin.drivers.index');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trucks = Truck::all();

        return view('admin.drivers.create', compact('trucks'));
    }


    public function store(Request $request)
    {
        // try {
        //     DB::beginTransaction();
        
        //     $request->validate([
        //         'name' => 'required|string|max:255',
        //         'phone' => 'required|string|max:255',
        //         'email' => 'nullable|email|unique:drivers,email,',
        //         'address' => 'nullable|string|max:255',
        //         'license_number' => 'required|string|max:255',
        //         'truck_id' => 'required|exists:trucks,id',
        //         'status' => 'required|in:متاح,مشغول,في الطريق',
        //     ], [
        //         'name.required' => 'الرجاء إدخال اسم السائق.',
        //         'phone.required' => 'الرجاء إدخال رقم الهاتف.',
        //         'email.email' => 'الرجاء إدخال بريد إلكتروني صالح.',
        //         'email.unique' => 'البريد الاكتروني موجود من قبل ',
        //         'license_number.required' => 'الرجاء إدخال رقم الرخصة.',
        //         'truck_id.required' => 'الرجاء اختيار الشاحنة.',
        //     ]);
        
        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //         'role' => 'driver',
        //     ]);
        
        //     Driver::create([
        //         'name' => $request->name,
        //         'phone' => $request->phone,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //         'address' => $request->address,
        //         'license_number' => $request->license_number,
        //         'truck_id' => $request->truck_id,
        //         'status' => $request->status,
        //         'user_id' => $user->id,
        //     ]);
        
        //     DB::commit();
        //     toastr()->success('تم حفظ بيانات السائق بنجاح.');
        //     return redirect()->route('drivers.index');
        
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     // toastr()->error('حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }

        try {
            DB::beginTransaction();
        
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'nullable|email|unique:drivers,email,',
                'address' => 'nullable|string|max:255',
                'license_number' => 'required|string|max:255',
                'truck_id' => 'required|exists:trucks,id',
                'password' => 'required|string|min:8',
                'status' => 'required|in:متاح,مشغول,في الطريق',
            ], [
                'name.required' => 'الرجاء إدخال اسم السائق.',
                'phone.required' => 'الرجاء إدخال رقم الهاتف.',
                'email.email' => 'الرجاء إدخال بريد إلكتروني صالح.',
                'email.unique' => 'البريد الاكتروني موجود من قبل ',
                'license_number.required' => 'الرجاء إدخال رقم الرخصة.',
                'truck_id.required' => 'الرجاء اختيار الشاحنة.',
            ]);
        
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'driver',
            ]);
        
            Driver::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'license_number' => $request->license_number,
                'truck_id' => $request->truck_id,
                'user_id' => $user->id, // هنا يتم إضافة user_id بشكل صحيح
                'status' => $request->status,
            ]);
        

            DB::commit();
            toastr()->success('تم حفظ بيانات السائق بنجاح.');
            return redirect()->route('drivers.index');
        
        } catch (\Exception $e) {
            DB::rollback();
            // toastr()->error('حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
        

        // try {
        //     $request->validate([
        //         'name' => 'required|string|max:255',
        //         'phone' => 'required|string|max:255',
        //         'email' => 'nullable|email|unique:drivers,email,',
        //         'address' => 'nullable|string|max:255',
        //         'license_number' => 'required|string|max:255',
        //         'truck_id' => 'required|exists:trucks,id',
        //         'status' => 'required|in:متاح,مشغول,في الطريق',
        //     ], [
        //         'name.required' => 'الرجاء إدخال اسم السائق.',
        //         'phone.required' => 'الرجاء إدخال رقم الهاتف.',
        //         'email.email' => 'الرجاء إدخال بريد إلكتروني صالح.',
        //         'email.unique' => 'البريد الاكتروني موجود من قبل ',
        //         'license_number.required' => 'الرجاء إدخال رقم الرخصة.',
        //         'truck_id.required' => 'الرجاء اختيار الشاحنة.',
        //     ]);

        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' =>Hash::make($request->password),
        //         'role' => 'driver',
        //     ]);
        //     Driver::create([
        //         'name' => $request->name,
        //         'phone' => $request->phone,
        //         'email' => $request->email,
        //         'password' =>Hash::make($request->password),
        //         'address' => $request->address,
        //         'license_number' => $request->license_number,
        //         'truck_id' => $request->truck_id,
        //         'user_id' => $user->id,
        //         'status' => $request->status,
        //     ]);

        //     toastr()->success('تم حفظ بيانات السائق بنجاح.');
        //     return redirect()->route('drivers.index');

        // } catch (\Exception $e) {
        //     // toastr()->error('حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }


    public function show(string $id)
    {
        //
    }



    public function edit(string $id)
    {
        $driver = Driver::findOrFail($id);
        $trucks = Truck::all();
        return view('admin.drivers.edit', compact('driver', 'trucks'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'nullable|email|unique:drivers,email,' . $id,
                'address' => 'nullable|string|max:255',
                'license_number' => 'required|string|max:255',
                'truck_id' => 'required|exists:trucks,id',
                'status' => 'required|in:متاح,مشغول,في الطريق',
            ], [
                'name.required' => 'الرجاء إدخال اسم السائق.',
                'phone.required' => 'الرجاء إدخال رقم الهاتف.', 
                'email.email' => 'الرجاء إدخال بريد ألكتروني صالح.',
                'email.unique' => 'البريد الاكتروني موجود من قبل ',
                'license_number.required' => 'الرجاء إدخال رقم الرخصة.',
                'truck_id.required' => 'الرجاء اختيار الشاحنة.',
            ]);

            $driver = Driver::findOrFail($id);
            $driver->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'license_number' => $request->license_number,
                'truck_id' => $request->truck_id,
                'status' => $request->status,
            ]);

            toastr()->success('تم تحديث بيانات السائق بنجاح.');
            return redirect()->route('drivers.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(string $id)
    {
        try {
            Driver::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => ' تم حذف بيانات  السائق بنجاح !']);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




    public function details($driver_id)
    {
        $driver = Driver::findOrFail($driver_id);
        return view('admin.drivers.details_driver', compact('driver'));
    }



}

