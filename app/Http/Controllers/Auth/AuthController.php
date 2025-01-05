<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'gender' => 'required|string',
        ]);

        if ($validated) {
            $user = User::create($validated);
            $token =  $user->createToken('auth_token')->plainTextToken;

            Mail::to($user->email)->send(new UserRegistered($user));

            return response()->json([
                'message' => 'Register successful',
                'user' => $user,
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Something went wrong!'
        ]);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // $token =  $request->user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $request->user(),
        ]);
    }
}
