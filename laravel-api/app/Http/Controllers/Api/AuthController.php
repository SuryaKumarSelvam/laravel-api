<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        try {
            $registration = Registration::create([
                'first_name' => $request->firstname,
                'last_name'  => $request->lastname,
                'email'     =>  $request->email,
                'password'  =>  Hash::make($request->password),
                'terms_condition' => $request->terms ? 'accepted' : 'not accepted'
            ]);
            return response()->json([
                "message" => "User Registration Success",
                "status"  => 200
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Somthing Went Wroung",
                "status"  => 500
            ]);
        }
    }
}
