<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use App\Models\Task;

class ProfileController extends Controller
{

   public function store(StoreProfileRequest $request){
   $profile = Profile::create(
       $request->validated()
    );
   return response()->json($profile, 201);
    }

      public function show($id){
        $profile = Profile :: find($id);
        return response()->json($profile,200);
    }

    public function destroy($id){
        $profile = Profile :: findOrFail($id);
        $profile->delete();
        return response()->json(["msg"=> "Deleted successfully"], 200);
    }
}