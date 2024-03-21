<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Nudge\EditController;
use App\Http\Controllers\Admin\Nudge\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');

Route::prefix('nudges')
    ->as('nudges.')
    ->group(function (): void {
        Route::get('/edit/{nudge}', EditController::class)->name('edit');
        Route::put('{nudge}', UpdateController::class)->name('update');
    });
