<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('empresas')->group(function (){
    Route::get('', [EmpresaController::class, 'index']);
    Route::post('', [EmpresaController::class, 'store']);
    Route::get('/{recnum}', [EmpresaController::class, 'show']);
    Route::get('/{recnum}/edit', [EmpresaController::class, 'edit']);
    Route::put('/{recnum}/edit', [EmpresaController::class, 'update']);
    Route::delete('/{recnum}/delete', [EmpresaController::class, 'destroy']);
});

Route::prefix('clientes')->group(function (){
    Route::get('', [ClienteController::class, 'index']);
    Route::post('', [ClienteController::class, 'store']);
    Route::get('/{recnum}', [ClienteController::class, 'show']);
    Route::get('/{recnum}/edit', [ClienteController::class, 'edit']);
    Route::put('/{recnum}/edit', [ClienteController::class, 'update']);
    Route::delete('/{recnum}/delete', [ClienteController::class, 'destroy']);
});
