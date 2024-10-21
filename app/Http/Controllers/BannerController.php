<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Admin\PinOffice;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    // Display a list of banners
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    // Show the form to create a new banner
    public function create()
    {
        return view('admin.banner.create');
    }

    // Store a new banner
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|',
            'status' => 'nullable|boolean',
            'display_order' => 'nullable|integer',
        ]);
        // dd($validatedData);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            $validatedData['image'] = $imagePath;
        }
        $validatedData['status'] = $request->has('status') ? true : false;
        Banner::create($validatedData);

        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }

    // Show the form to edit a specific banner
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    // Update a specific banner
    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'status' => 'nullable|boolean',
            'display_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image) {
                \Storage::disk('public')->delete($banner->image);
            }

            $imagePath = $request->file('image')->store('banners', 'public');
            $validatedData['image'] = $imagePath;
        }
        // dd($request->has('status'));
        if($request->status == true) {
            $validatedData['status'] = 1;
        } else {
            $validatedData['status'] = 0;
        }
        $banner->update($validatedData);

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
    }

    // Delete a specific banner
    public function destroy($id)
    {
        $banner = Banner::where('id', $id)->first();
        // dd($banner);
        if ($banner->image) {
            \Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }

    public function pinCheck(Request $request) {

        $request->validate([
            'pin' => 'required|string|max:10', // Adjust validation rules as needed
        ]);
        $pin = $request->input('pin');
        $exists = PinOffice::where('pin', $pin)->exists();
        $userPincode = PinOffice::where('pin', $pin)->first();
        if ($userPincode) {
            if(Auth::check() && Auth::user()->hasRole('Customer')) {
                Auth::user()->update(['pincode_id' => $userPincode->id]); 
            }
            $userPincodeHtml = view('front.common.customer-pin', compact('userPincode'))->render();
            return response()->json(['available' => true, 'userPincodeHtml' => $userPincodeHtml]);
        }
        $userPincodeHtml =  view('front.common.customer-pin', compact('userPincode'))->render();
        return response()->json(['available' => $exists, 'userPincodeHtml' => $userPincodeHtml]);        
    }
}
