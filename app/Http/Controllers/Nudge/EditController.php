<?php

declare(strict_types=1);

namespace App\Http\Controllers\Nudge;

use App\Enums\Nudge\NudgeStatus;
use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(
        Nudge $nudge,
    ): View {
        abort_if(auth()->id() !== $nudge->user_id || $nudge->status !== NudgeStatus::DRAFT, 404);

        return view('nudges.edit', [
            'nudge' => $nudge,
        ]);
    }
}
