<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
 
class UserController extends Controller
{



    public function register(Request $request)
    {
       
        // $validator = Validator::make($request->all(), [
        //     'name' => 'string|max:255',
        //     'email' => 'required|email|umax:255',
        //     'password' => 'required|min:10',
        // ]);
       
        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //     return response()->json([
        //         'error' => $errors
        //     ], 400);
        // }
        // if ($validator->passes()) {

            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    




    public function login(Request $request)
    { 

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        $user = auth()->user();
        $token = $user->createToken('user-token')->plainTextToken;
        $data = [
            'token' => $token,
            'user' => $user,
        ];
        return response()->json($data, 200);


        // $user = User::where('email', $request->email)->first();
     
        // if (! $user || ! Hash::check($request->password, $user->password)) {
        //          return response()->json([
        //         'message' => 'Invalid login details'
        //     ], 401);
        // }


        // $token = $user->createToken('user-token')->plainTextToken;
        // $data = [
        //     'token' => $token,
        //     'user' => $user,
        // ];
        // return response()->json($data, 200);
      
    

}
}