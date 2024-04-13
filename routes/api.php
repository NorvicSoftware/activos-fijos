<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AssetAPIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth')->group(function () {
    //crear un activo fijo
    //mostrar los activos fijos que tiene mi base de datos
    //actualizar un activo fijo
    // eliminar un activo fijo
});

Route::get('/assets', [AssetAPIController::class, 'index']);
Route::post('/assets/create', [AssetAPIController::class, 'store']);
Route::get('/assets/show/{assetId}', [AssetAPIController::class, 'show']);
Route::put('/assets/edit/{assetId}', [AssetAPIController::class, 'update']);

Route::get('/agencies', [AssetAPIController::class, 'index']);
Route::post('/agencies/create', [AssetAPIController::class, 'store']);
Route::get('/agencies/show/{assetId}', [AssetAPIController::class, 'show']);
Route::put('/agencies/edit/{assetId}', [AssetAPIController::class, 'update']);
