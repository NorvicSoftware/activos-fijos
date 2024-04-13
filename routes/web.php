<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ManagerController;

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

Route::get('/managers', 'ManagerController@index');
Route::get('/managers/create', 'ManagerController@create');
Route::post('/managers', 'ManagerController@store');
Route::get('/managers/{manager}', 'ManagerController@show');
Route::get('/managers/{manager}/edit', 'ManagerController@edit'); 
Route::put('/managers/{manager}', 'ManagerController@update');
Route::delete('/managers/{manager}', 'ManagerController@destroy');


});

Route::resource('agencies', AgencyController::class);

require __DIR__.'/auth.php';
