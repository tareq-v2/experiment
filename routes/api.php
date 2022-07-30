<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserApiController::class, 'index']);
Route::get('/users/show/{id}', [UserApiController::class, 'show']);
Route::post('/users/create', [UserApiController::class, 'create']);
Route::get('/users/update/{id}', [UserApiController::class, 'update']);
Route::delete('/users/delete/{id}', [UserApiController::class, 'destroy']);
