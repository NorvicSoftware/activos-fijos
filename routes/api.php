<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AssetAPIController;
use App\Http\Controllers\InventoryApiController;

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

Route::get('/agencies', [AgencyAPIController::class, 'index']);
Route::post('/agencies/create', [AgencyAPIController::class, 'store']);
Route::get('/agencies/show/{agencyId}', [AgencyAPIController::class, 'show']);
Route::put('/agencies/edit/{agencyId}', [AgencyAPIController::class, 'update']);

Route::get('inventories/{id}', [InventoryApiController::class, 'show']);
Route::post('inventories/store', [InventoryApiController::class, 'store']);
Route::put('inventories/{id}', [InventoryApiController::class, 'update']);

