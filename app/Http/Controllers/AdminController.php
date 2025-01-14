<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view("admin.dashboard");
    }
    public function createOrUpdate()
{
    $data['banner'] = Setting::first();
    return view('admin.settings.setting', $data);
}

public function saveOrUpdate(Request $request)
{
    $request->validate([
        'banner_title' => 'required|string|max:255',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $banner = Setting::first(); 

    if ($request->hasFile('banner_image')) {
        $image = $request->file('banner_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); 
        $image->storeAs('images/banners', $imageName, 'public'); 
        $imagePath = 'images/banners/' . $imageName; 
    } else {
        $imagePath = $banner?->banner_image; 
    }
    

    if ($banner) {
        $banner->update([
            'banner_title' => $request->banner_title,
            'banner_image' => $imagePath,
        ]);
    } else {
        Setting::create([
            'banner_title' => $request->banner_title,
            'banner_image' => $imagePath,
        ]);
    }

    return redirect()->back()->with('success', 'Banner saved successfully.');
}

}
