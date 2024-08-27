<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Controller;

// Grupo de rutas para la API
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('get-type-identity/identity-type',[RegisterController::class, 'identityTypes']);

// Ruta de prueba para verificar que el servidor está funcionando
Route::post('register/submit-form', [RegisterController::class, 'registerUser']);
