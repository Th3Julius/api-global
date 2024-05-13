<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/employees', [EmployeeController::class,'index']);

Route::get('/employees/{id}',function (){
    return 'empleados List';
});

Route::post('/employees', [EmployeeController::class,'store']);

Route::put('/employees/{id}',function (){
    return 'Actualizando empleado';
});

Route::delete('/employees/{id}',function (){
    return 'Borrando empleado';
});



