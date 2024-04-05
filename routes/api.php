<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth')->group(function () {
    //crear un activo fijo
    //mostrar los activos fijos que tiene mi base de datos
    //actualizar un activo fijo
    // eliminar un activo fijo
});
