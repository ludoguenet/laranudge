<?php

declare(strict_types=1);

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Nudge\DestroyController;
use App\Http\Controllers\Nudge\ShowController;
use App\Http\Controllers\Nudge\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RSSFeedController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('homepage');
Route::get('feed', RSSFeedController::class)->name('rss.feed');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashBoardController::class)->name('dashboard');

    Route::view('/privacy', 'privacy')->name('privacy');
    Route::view('/about', 'about')->name('about');

    Route::prefix('nudges')
        ->as('nudges.')
        ->group(function () {
            Route::view('/create', 'nudges.create')->name('create');
            Route::get('/{nudge:slug}', ShowController::class)->name('show');
            Route::post('/', StoreController::class)->name('store');
            Route::delete('/{nudge}', DestroyController::class)->name('destroy');
        });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
