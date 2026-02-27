<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getProfle($id){
        $profile = User :: find($id)-> profile;
        return response()->json($profile,200);
    }

    public function getUserTasks ($id){
        $tasks = User :: find($id)-> tasks;
        return response()->json($tasks,200);
    }
}
