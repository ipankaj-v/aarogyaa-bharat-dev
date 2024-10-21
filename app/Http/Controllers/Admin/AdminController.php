<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function login() {
        return view('admin.auth.login');
    }

    public function loginAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->route('admin.login')
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput();
    }

    // Handle logout
    public function logout()
    {
        // Auth::guard('admin')->logout();
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
