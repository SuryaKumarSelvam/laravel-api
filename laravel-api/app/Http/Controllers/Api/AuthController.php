<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function addUser(Request $request)
    {

        $email = $request->email;
        $password = $request->password;
        $user = User::all();
        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => "User Available",
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "User Not Available",
                'data' => $user
            ]);
        }
    }
}
