<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use App\Trait\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DriverProfileController extends Controller
{

    use ImageUploadTrait;

    public function index()
    {
        $profile = Driver::where('user_id', Auth::user()->id)->first();
        return view('driver.driver-profile.index', compact('profile'));
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
    
        $user = Auth::user();
        
        $driver = Driver::where('user_id', $user->id)->first();
    
        if ($request->hasFile('image')) {
            $this->updateUserImage($request, $user);
        }
    
        $this->updateUserData($request, $user);
        $this->updateDriverData($request, $driver);
    
        toastr('تم التعديل بنجاح!', 'success');
    
        return redirect()->back();
    }
    
    private function validateRequest(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:200'],
            'phone' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:200'],
            'password' => ['sometimes'],
            'address' => ['required'],
        ]);
    }
    
    private function updateUserImage(Request $request, User $user)
    {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);
        $path = 'uploads/' . $imageName;
    
        $user->update(['image' => $path]);
    }
    
    private function updateUserData(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
        ]);
    }
    
    private function updateDriverData(Request $request, Driver $driver)
    {
        $driver->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $driver->password,
            'address' => $request->address,
        ]);
    }
    

}




