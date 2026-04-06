<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function adduser(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'policy' => 'accepted',
        ]);

        //  Create new user
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'policy' => 'accepted',

        ]);

        //  Auto login
        Auth::login($user);

        // Redirect
        return redirect()->route('items.index')->with('success', 'Registration successful!');
    }
}
