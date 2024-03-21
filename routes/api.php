<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Admin\ValidateNudgeController;
use App\Http\Controllers\Api\Nudge\ToggleLikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function (): void {
    Route::get('/user', fn (Request $request) => $request->user());

    Route::prefix('nudges')
        ->as('nudges.')
        ->group(function (): void {
            Route::post('/toggle-like/{nudge}', ToggleLikeController::class)->name('like');
        });

    Route::middleware('admin')
        ->prefix('admin')
        ->as('admin.')
        ->group(function (): void {
            Route::prefix('nudges')
                ->as('nudges.')
                ->group(function (): void {
                    Route::put('/{nudge}/validate', ValidateNudgeController::class)->name('validate');
                });
        });
});
