<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Register Function Used By /register Route In Web.php file
    public function register(Request $request)
    {
        // Create User object By Using create Method From User Model
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Create The Token : String Of 80 Random Characters
        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        // Return The Data Object With With Success Status 200
        return response()->json($data, 200);

    }


    // Login Function Used By /login Route In Web.php file
    public function login(Request $request)
    { 

        // Check if The User Exists .. and the Password Matches
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            // Return Response Json Object With Message Explain The Email Not Found Or The Password Is Wrong With not-found Status 401 
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);

        }
        
        // Get The user Object
        $user = auth()->user();

        // Create The Token : String Of 80 Random Characters
        $token = $user->createToken('user-token')->plainTextToken;
        
        // Prepare The Data To Be sent To The Client Side
        $data = [
            'token' => $token,
            'user' => $user,
        ];

        // Return The Data Object With With Success Status 200
        return response()->json($data, 200);
    }

}