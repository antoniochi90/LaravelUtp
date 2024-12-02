<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;

Route::get('/', function(){
    return view('welcome');
}); // Para mostrar la vista con los coches

Route::get('/coche/create', [CocheController::class, 'create'])->name('coches.create');
Route::get('/coche/{id}', [CocheController::class, 'show']); // Para ver los detalles del coche
Route::post('/coche', [CocheController::class, 'store'])->name('coches.store');
Route::get('/coche/update/{id}', [CocheController::class, 'viewUpdate'])->name('coche.actualizar');
Route::put('/coche/{id}', [CocheController::class, 'update'])->name('coche.update');
Route::delete('/coche/{id}', [CocheController::class, 'destroy'])->name('coche.destroy');
Route::get('/allcoches', [CocheController::class, 'getall']);
Route::get('/coches/pdf', [CocheController::class, 'exportPdf'])->name('coches.pdf');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [CocheController::class, 'index']) ->name('dashboard');
});
