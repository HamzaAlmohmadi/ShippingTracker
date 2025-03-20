<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\TruckDataTable;
use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{

    public function index(TruckDataTable $dataTable)
    {
        return $dataTable->render('admin.truck.index');
    }


    public function create()
    {
        return view('admin.truck.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'truck_number' => 'required|string|max:255|unique:trucks,truck_number',
            'capacity' => 'nullable|',
            // 'status' => 'required|in:active,inactive,maintenance',
        ]);

        Truck::create([
            'name' => $request->name,
            'truck_number' => $request->truck_number,
            'capacity' => $request->capacity,
            'status' => 'active'
        ]);
        return redirect()->route('trucks.index')->with('success', 'Truck created successfully.');
    }



    public function show(string $id)
    {
        //
    }

  

    public function edit(string $id)
    {
        $truck = Truck::findOrFail($id);
        return view('admin.truck.edit', compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'truck_number' => 'required|string|max:255|unique:trucks,truck_number,' . $truck->id,
            'capacity' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive,maintenance',
        ]);

        $truck->update([
            'name' => $request->name,
            'truck_number' => $request->truck_number,
            'capacity' => $request->capacity,
            'status' => $request->status
        ]);
        
        return redirect()->route('trucks.index')->with('success', 'Truck updated successfully.');
    }

    


    public function destroy(string $id)
    {

        $truck = Truck::findOrFail($id);  
        $truck->delete();  
    
        return response()->json(['status' => 'success', 'message' => ' تم حذف بيانات   بنجاح !']);


    }
    
}


