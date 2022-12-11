<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            // unique:users,email === unique to the users table and email field
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

   public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You are logouted now :)'
        ];
   }

   public function login(Request $request) {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check email
        $user = User::where('email', $formFields['email'])->first();

        // Check password
        if(!$user || !Hash::check($formFields['password'], $user->password)) {
            return response(['message' => 'Bad creds'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
   }
}
