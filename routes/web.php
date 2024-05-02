<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/managers', [ManagerController::class, 'index'])->name('managers.index');

    Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');
    Route::get('/assets/create', [AssetController::class, 'create'])->name('assets.create');
    Route::post('/assets/create', [AssetController::class, 'store'])->name('assets.store');
    Route::get('/assets/edit/{id}', [AssetController::class, 'edit'])->name('assets.edit');
    Route::put('/assets/edit/{id}', [AssetController::class, 'update'])->name('assets.update');

    Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories.index');
Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventories.create');
Route::post('/inventories', [InventoryController::class, 'store'])->name('inventories.store');
Route::get('/inventories/{id}', [InventoryController::class, 'show'])->name('inventories.show');
Route::get('/inventories/{id}/edit', [InventoryController::class, 'edit'])->name('inventories.edit');
Route::put('/inventories/{id}', [InventoryController::class, 'update'])->name('inventories.update');
Route::delete('/inventories/{id}', [InventoryController::class, 'destroy'])->name('inventories.destroy');
Route::get('/inventories/search', [InventoryController::class, 'search'])->name('inventories.search');
Route::put('/inventories/{inventory}/assets/{asset}', 'InventoryController@updateAssetStatus')->name('inventories.assets.update');
Route::get('/inventories/read/assets', [InventoryController::class, 'read'])->name('inventories.read');

});

//Route::resource('agencies', AgencyController::class);

require __DIR__.'/auth.php';
