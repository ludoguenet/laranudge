<?php

declare(strict_types=1);

namespace App\Http\Controllers\Nudge;

use App\Enums\Nudge\NudgeStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Nudge\UpdateRequest;
use App\Models\Nudge;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(
        Nudge $nudge,
        UpdateRequest $request,
    ): RedirectResponse {
        $validated = $request->validated();

        $status = $validated['draft'] === true ? NudgeStatus::DRAFT : NudgeStatus::NOT_VALIDATED;

        $nudge->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'code' => $validated['code'],
            'status' => $status,
        ]);

        if ($status === NudgeStatus::NOT_VALIDATED) {
            return redirect()->route('dashboard')->with('info', 'Nudge submitted! It will be available publicly after validation.');
        }

        return redirect()->back()->with('status', 'nudge-edited');
    }
}
