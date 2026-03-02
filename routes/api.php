<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route :: apiResource('tasks', TaskController :: class);
Route :: get('task/{id}/user', [TaskController :: class , 'getTaskUser']);

Route :: post('profile', [ProfileController :: class, 'store']);
Route :: get('profile/{id}', [ProfileController :: class , 'show']);
Route :: put('profile/{id}', [ProfileController :: class , 'update']);



Route :: get('user/{id}/profile', [UserController :: class , 'getProfle']);
Route :: get('user/{id}/tasks', [UserController :: class , 'getUserTasks']);


Route :: post('register',[UserController :: class , 'register']);
Route :: post('login', [UserController :: class , 'login']);
Route :: post('logout', [UserController :: class , 'logout'])->middleware('auth:sanctum');