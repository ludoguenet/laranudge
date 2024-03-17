<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Enums\Nudge\NudgeStatus;
use App\Http\Controllers\Controller;
use App\Models\Nudge;
use App\Models\User;
use App\Notifications\Nudge\NudgeValidated;
use Illuminate\Http\Response;

class ValidateNudgeController extends Controller
{
    public function __invoke(
        Nudge $nudge,
    ): Response {
        $newStatus = $nudge->validated() ? NudgeStatus::NOT_VALIDATED : NudgeStatus::VALIDATED;

        $nudge->update([
            'status' => $newStatus,
        ]);

        if ($newStatus === NudgeStatus::VALIDATED) {
            /** @var User $author */
            $author = $nudge->user;

            $author->notify(new NudgeValidated($nudge));
        }

        return response()->noContent();
    }
}
