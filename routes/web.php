<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AssetController;

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



    Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');
    Route::get('assets/create', [AssetController::class, 'create'])->name('assets.create');
    Route::post('assets/create', [AssetController::class, 'store'])->name('assets.store');
    Route::get('assets/show/{assetId}', [AssetController::class, 'show'])->name('assets.show');
    Route::get('asset/edit/{assetId}', [AssetController::class, 'edit'])->name('assets.edit');
    Route::put('asset/edit/{assetId}', [AssetController::class, 'update'])->name('assets.update');
    Route::delete('asset/delete/{assetId}', [AssetController::class, 'destroy'])->name('assets.destroy');

});

require __DIR__.'/auth.php';
