<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Nudge\DestroyController;
use App\Http\Controllers\Nudge\StoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePageController::class)->name('homepage');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::prefix('nudges')
        ->as('nudges.')
        ->group(function () {
            Route::view('/create', 'nudges.create')->name('create');
            Route::post('/', StoreController::class)->name('store');
            Route::delete('/{nudge}', DestroyController::class)->name('destroy');
        });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
