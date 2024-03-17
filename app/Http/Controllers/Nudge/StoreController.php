<?php

declare(strict_types=1);

namespace App\Http\Controllers\Nudge;

use App\Enums\Nudge\NudgeStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Nudge\StoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(
        StoreRequest $request,
    ): RedirectResponse {
        $validated = $request->validated();

        $status = $validated['draft'] === true ? NudgeStatus::DRAFT : NudgeStatus::NOT_VALIDATED;

        /** @var User $user */
        $user = auth()->user();

        $user->nudges()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'code' => $validated['code'],
            'status' => $status,
        ]);

        return redirect()->back()->with('status', 'nudge-created');
    }
}
