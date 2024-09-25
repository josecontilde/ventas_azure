<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\marcaController;
use App\Http\Controllers\Api\clienteController;


//marca
Route::get('/marca', [marcaController::class, 'index']);

Route::post('/marca', [marcaController::class, 'store']);

Route::get('/marca/{id}', [marcaController::class, 'show']);

Route::put('/marca/{id}', [marcaController::class, 'update']);

Route::delete('/marca/{id}', [marcaController::class, 'destroy']);

//cliente
Route::get('/cliente', [clienteController::class, 'index']);

Route::post('/cliente', [clienteController::class, 'store']);

Route::get('/cliente/{id}', [clienteController::class, 'show']);    

Route::put('/cliente/{id}', [clienteController::class, 'update']);

Route::delete('/cliente/{id}', [clienteController::class, 'destroy']);