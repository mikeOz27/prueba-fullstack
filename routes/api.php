<?php

use App\Http\Middleware\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeadquarterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('headquarters', HeadquarterController::class); //API PARA CONSULTAR LAS SEDES POR TEST

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login'); //API PARA HACER LOGIN
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/get_location', [HeadquarterController::class, 'get_location'])->name('get_location'); //API PARA OBTENER LA UBICACION DE LAS
});



