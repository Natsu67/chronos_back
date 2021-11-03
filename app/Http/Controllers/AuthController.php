<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    User,
    Calendar,
    User_calendar
};
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login'=> 'required|string',
            'password'=> 'required|string|min:4'
        ]);


        $credentials = $request->only(['login', 'password']);


        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $user->remember_token = $token;
            $user->save();

            return response([
                'message' => 'Logged in',
                'token' => $token,
                'user' => $user
            ]);
        } else {
            return response([
                'message' => 'Incorrect log in!'
                ], 400);
        }
    }

    public function register(Request $request)
    {
        $validated =  $request->validate([
            'login'=> 'required|string|unique:users,login',
            'full_name'=> 'required|string',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|confirmed|min:4',
            'region' => 'required|string|min:2'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $calendar = Calendar::create([
            'title' => 'Main calendar',
            'user_id' => $user->id,
            'main' => '1',
        ]);

        User_calendar::create([
            'user_id' => $user->id,
            'calendar_id' => $calendar->id,
        ]);

        return response([
            'message' => 'User registered. Please log in',
            'user' => $user
        ]);
    }

    public function user()
    {
        return Auth::user();
    }

    public function logout(Request $request)
    {

        return response([
            'message' => 'Logout Success'
        ];
    }

}
