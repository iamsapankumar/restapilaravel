<?php

namespace App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            "email" => "required|email",
            "password" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
        $newuser = $request->all();
        $newuser['password']=Hash::make($newuser['password']);
        $user =User::create($newuser);
        $success['token']=$user->createToken('AppName')->accessToken;
        return response()->json([
            'success'=>$success
        ],200);
    }
}
