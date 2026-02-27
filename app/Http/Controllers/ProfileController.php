<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
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
        $profile = Profile :: where ('user_id',$id)->first();
        return response()->json($profile,200);
    }

 public function update(UpdateProfileRequest $request, $id){
        $profile = Profile :: findOrFail($id);
      
        $profile->update($request->validated());
       return response()->json($profile, 200);
    }
}