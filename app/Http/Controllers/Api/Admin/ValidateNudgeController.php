<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\Http\Response;

class ValidateNudgeController extends Controller
{
    public function __invoke(
        Nudge $nudge,
    ): Response {
        $nudge->update([
            'validated' => ! $nudge->validated,
        ]);

        return response()->noContent();
    }
}
