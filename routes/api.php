<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\EmployeeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/register", [AuthApiController::class,'Register']);
Route::post("/login", [AuthApiController::class,'Login']);
Route::post('/logout', [AuthApiController::class,'Logout'])->middleware('auth:api');
//emplo

Route::get("login", function(){
    return response()->json([
        'success'=>false,
        'message'=>"you sre not log in please login first"
    ]);
});



Route::middleware('auth:api')->group(function () {
    Route::get("/", [EmployeeApiController::class,'index']);
    Route::post("/store",[EmployeeApiController::class,'save']);
    Route::put("/update/{id}", [EmployeeApiController::class,'update']);
    Route::delete('/delete/{id}', [EmployeeApiController::class,'delete']);
});
