<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register(Request $request){
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|confirmed|min:8',
            ]
        );
      $user =  User :: create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        return response()->json([
            'message' => "Register Successfully",
            'user' => $user,
            
        ],201);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);
        if(!Auth :: attempt($request->only('email','password'))){
             return response()->json(
            [
                'message' => 'invalid email or password',
                
            ],401
        );
        }
       $user = User :: where('email', $request->email)-> firstOrFail();
      $token = $user->createToken('auth_Token')->plainTextToken;

       return response()->json([
            'message' => 'Login Successfully',
            'user' => $user,
            'token' => $token,
            
        ],200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(
            [
                'message' => "Logout successfully",
            ],
            200
        );
    }


    public function getProfle($id){
        $profile = User :: find($id)-> profile;
        return response()->json($profile,200);
    }

    public function getUserTasks ($id){
        $tasks = User :: find($id)-> tasks;
        return response()->json($tasks,200);
    }
}
