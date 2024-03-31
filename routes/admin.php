<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Nudge\EditController;
use App\Http\Controllers\Admin\Nudge\UpdateController;
use App\Http\Controllers\Admin\User\DestroyController;
use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');

Route::prefix('nudges')
    ->as('nudges.')
    ->group(function (): void {
        Route::get('/edit/{nudge}', EditController::class)->name('edit');
        Route::put('{nudge}', UpdateController::class)->name('update');
    });

Route::prefix('users')
    ->as('users.')
    ->group(function (): void {
        Route::get('/', UserIndexController::class)->name('index');
        Route::delete('/{user}', DestroyController::class)->name('destroy');
    });
