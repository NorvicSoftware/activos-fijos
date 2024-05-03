<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\AgencyController;

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



    // Archivo routes/web.php

    Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');
    Route::get('/assets/create', [AssetController::class, 'create'])->name('assets.create');
    Route::post('/assets/create', [AssetController::class, 'store'])->name('assets.store');
    Route::get('/assets/edit/{id}', [AssetController::class, 'edit'])->name('assets.edit');
    Route::put('/assets/edit/{id}', [AssetController::class, 'update'])->name('assets.update');

    Route::get('/repairs', [RepairController::class, 'index'])->name('repairs.index');
    Route::get('/repairs/create', [RepairController::class, 'create'])->name('repairs.create');
    Route::post('/repairs/create', [RepairController::class, 'store'])->name('repairs.store');
    Route::get('/repairs/edit/{id}', [RepairController::class, 'edit'])->name('repairs.edit');
    Route::put('/repairs/edit/{id}', [RepairController::class, 'update'])->name('repairs.update');

    Route::get('/agencies', [AgencyController::class, 'index'])->name('agencies.index');
    Route::get('/agencies/create', [AgencyController::class, 'create'])->name('agencies.create');
    Route::post('/agencies/create', [AgencyController::class, 'store'])->name('agencies.store');
    Route::get('/agencies/edit/{id}', [AgencyController::class, 'edit'])->name('agencies.edit');
    Route::put('/agencies/edit/{id}', [AgencyController::class, 'update'])->name('agencies.update');

    
    Route::get('/agencies', [AgencyController::class, 'index'])->name('agencies.index');
    Route::get('/agencies/create', [AgencyController::class, 'create'])->name('agencies.create');
    Route::post('/agencies/create', [AgencyController::class, 'store'])->name('agencies.store');

});

//Route::resource('agencies', AgencyController::class);

require __DIR__.'/auth.php';
