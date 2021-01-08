<?php

namespace App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function loginUser(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($credentials)) {
            /** @var \App\Models\User */
            $user = Auth::user();
            $success['token'] = $user->createToken('AppName')->accessToken;
            return response()->json([
                'success' => $success,
                'result' => 'Login Successful!'
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
