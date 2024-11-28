<?php

use App\Http\Controllers\CocheController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/coches', [CocheController::class, 'index']);

Route::get('/coche/{id}', [CocheController::class, 'show']); 

Route::post('/coche', [CocheController::class, 'store']);

Route::put('/coche/{id}', [CocheController::class, 'update']);

Route::delete('/coche/{id}', [CocheController::class, 'destroy']);