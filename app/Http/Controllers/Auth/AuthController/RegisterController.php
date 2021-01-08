<?php

namespace App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

     // Just for conventions
     // Thats it, Thank yousir
     // You're welcome, Have a nice day
     
    public function registerUser(Request $request)
    {
        $newuser = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        // the problem is no datas has been sent, dont know how to fix it in POSTMAN, because I rarely used it
        // now it shouldnt write ,,missing name" 
        // TODO Fix email validation, you can send in this format too: itsNOT@email   
        // email format:                   something@hosting.domain 
        // and ye, basically thats it, ti works. maybe xamp is offline or idk, but 
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
        // This it he controller? if yes let me test somehow (postman or form)
 
        // It works
        //where was mymistake? I dont think it was your mistake, but Postman didnt send datasthank you sir

       // $newuser  = $request->all();
        $newuser['password'] = Hash::make($newuser['password']);
        $user = User::create($newuser);
        $success['token'] = $user->createToken('AppName')->accessToken;
        $success['name'] =  $user->name;
        return response()->json([
            'success' => $success
        ], 200);
    }
}
