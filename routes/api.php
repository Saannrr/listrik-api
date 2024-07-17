<?php

use App\Http\Controllers\API\PelangganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('pelanggans', PelangganController::class);
