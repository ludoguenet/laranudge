<?php

declare(strict_types=1);

use App\Models\Nudge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin', 'auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::put('/{nudge}', function (Nudge $nudge) {
        $nudge->update([
            'validated' => ! $nudge->validated,
        ]);

        return response()->json([
            'response' => $nudge->validated,
        ]);
    })->name('nudges.toggle');
});
