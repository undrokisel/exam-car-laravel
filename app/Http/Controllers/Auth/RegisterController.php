<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'regex:/^[а-яА-Яa-zA-Z\s]+$/u'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/^8\(\d{3}\)-\d{3}-\d{2}-\d{2}$/'],
            'drivers_license' => ['required', 'string'],
            'password' => ['required', 'string', 'min:3', 'regex:/[0-9]/'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'drivers_license' => $request->drivers_license,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('bookings.index');
    }
}
