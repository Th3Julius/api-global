<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/employee', [EmployeeController::class,'index']);

Route::post('/employee', [EmployeeController::class,'store']);

Route::get('/employee/{id}',[EmployeeController::class,'show']);

// Route::get('/employee/{id}/{primer_nombre}',[EmployeeController::class,'mostrar']);


Route::delete('/employee/{id}', [EmployeeController::class,'destroy']);

Route::put('/employee/{id}', [EmployeeController::class,'update']); 