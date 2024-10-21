<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\RaiseQuery;
class RaiseQueryController extends Controller
{
    public function index()
    {
        return view('front.raise-query');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'product_name' => 'nullable|string',
            'file_upload' => 'required|file',
            'description' => 'nullable|string',
            'terms' => 'required'
        ]);

        if ($request->hasFile('file_upload')) {
            $imagePath = $request->file('file_upload')->store('query', 'public');
            $validated['file_upload'] = $imagePath;
        }

        RaiseQuery::create([
            'user_id' => auth()->id(), 
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'product_name' => $validated['product_name'],
            'file_upload' => $validated['file_upload'] ?? null,
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('success', 'Your query has been submitted successfully.');
    }

}
