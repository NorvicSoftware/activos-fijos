<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AssetAPIController;
use App\Http\Controllers\API\InventoryAPIController;

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

Route::get('/agencies', [AgencyAPIController::class, 'index']); // Corregido: usa el controlador adecuado para las agencias
Route::post('/agencies/create', [AgencyAPIController::class, 'store']); // Corregido: usa el controlador adecuado para las agencias
Route::get('/agencies/show/{agencyId}', [AgencyAPIController::class, 'show']); // Corregido: usa el controlador adecuado para las agencias
Route::put('/agencies/edit/{agencyId}', [AgencyAPIController::class, 'update']); // Corregido: usa el controlador adecuado para las agencias


Route::get('/inventories', [InventoryAPIController::class, 'index']);
Route::post('/inventories', [InventoryAPIController::class, 'store']);
Route::get('/inventories/{id}', [InventoryAPIController::class, 'show']);
Route::put('/inventories/{id}', [InventoryAPIController::class, 'update']);

Route::get('/inventories/read/assets', [InventoryAPIController::class, 'read']);
Route::delete('/inventories/{id}', [InventoryAPIController::class, 'destroy']);
Route::post('/inventories/search', [InventoryAPIController::class, 'search']);
Route::put('/inventories/{inventoryId}/assets/{assetId}', [InventoryAPIController::class, 'updateAssetStatus']); // Corregido: usa el controlador adecuado para los inventarios

