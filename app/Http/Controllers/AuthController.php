<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        try {
            $valid = $request->validate([
                'name' => 'required|max:50',
                'username' => 'required|max:20|unique:users',
                'email' => 'required|max:255|unique:users',
                'password' => 'required|min:4',
            ]);

            $user = User::create([
                'name' => $valid['name'],
                'username' => '@' . $valid['username'],
                'email' => $valid['email'],
                'password' => Hash::make($valid['password']),
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => "User registered successfully",
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function login(Request $request)
    {
        try {
            $valid = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('username', '=', '@' . $valid['username'])->first();

            if (!$user || !Hash::check($valid['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'credentials' => ['The provided credentials are incorrect.'],
                ]);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'User login successfully',
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ],);
        }
    }

    public function logout(Request $request)
    {
        try {
            // Get the token from the request
            $accessToken = $request->bearerToken();
    
            if ($accessToken) {
                // Delete the specific token from the database
                DB::table('personal_access_tokens')
                    ->where('token', hash('sha256', $accessToken)) // Sanctum stores tokens as a hashed value
                    ->delete();
    
                return response()->json([
                    'message' => 'User logged out successfully.',
                ], 200);
            }
    
            return response()->json([
                'message' => 'No access token provided.',
            ], 400);
    
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    

    public function me(Request $request)
    {
        try {
            return response()->json([
                'message' => 'User profile retrieved successfully',
                'data' => $request->user(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
