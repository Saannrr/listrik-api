<?php

use App\Http\Controllers\API\LevelController;
use App\Http\Controllers\API\PelangganController;
use App\Http\Controllers\API\PembayaranController;
use App\Http\Controllers\API\PenggunaanController;
use App\Http\Controllers\API\TagihanController;
use App\Http\Controllers\API\TarifController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route API dengan middleware auth:sanctum
Route::middleware('auth:sanctum')->group(function (){
   Route::apiResource('users', UserController::class);
   Route::apiResource('tarifs', TarifController::class);
   Route::apiResource('pelanggans', PelangganController::class);
   Route::apiResource('penggunaans', PenggunaanController::class);
   Route::apiResource('tagihans', TagihanController::class);
   Route::apiResource('pembayarans', PembayaranController::class);
   Route::apiResource('levels', LevelController::class);
   Route::post('logout', [UserController::class, 'logout']);
});

//Route untuk login dan register
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

