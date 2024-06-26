<?php

declare(strict_types=1);

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Nudge\DestroyController;
use App\Http\Controllers\Nudge\EditController;
use App\Http\Controllers\Nudge\MostLikedNudgesController;
use App\Http\Controllers\Nudge\PreviewController;
use App\Http\Controllers\Nudge\ShowController;
use App\Http\Controllers\Nudge\StoreController;
use App\Http\Controllers\Nudge\UpdateController;
use App\Http\Controllers\NudgerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RSSFeedController;
use App\Http\Controllers\Socialite\CallbackController;
use App\Http\Controllers\Socialite\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePageController::class)->name('homepage');
Route::get('/most-liked-nudges', MostLikedNudgesController::class)->name('most-liked-nudges');
Route::get('/@{user:name}', NudgerController::class)->name('nudger');
Route::get('feed', RSSFeedController::class)->name('rss.feed');

Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/about', 'about')->name('about');

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('/dashboard', DashBoardController::class)->name('dashboard');

    Route::prefix('nudges')
        ->as('nudges.')
        ->group(function (): void {
            Route::view('/create', 'nudges.create')->name('create');
            Route::get('/preview/{nudge:slug}', PreviewController::class)->name('preview');
            Route::post('/', StoreController::class)->name('store');
            Route::get('/edit/{nudge}', EditController::class)->name('edit');
            Route::put('{nudge}', UpdateController::class)->name('update');
            Route::delete('/{nudge}', DestroyController::class)->name('destroy');
        });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('nudges')
    ->as('nudges.')
    ->group(function (): void {
        Route::get('/{nudge:slug}', ShowController::class)->name('show');
    });

Route::get('/auth/{provider}/redirect', RedirectController::class)
    ->name('auth-provider-redirect');

Route::get('/auth/{provider}/callback', CallbackController::class)
    ->name('auth-provider-callback');

require __DIR__.'/auth.php';
