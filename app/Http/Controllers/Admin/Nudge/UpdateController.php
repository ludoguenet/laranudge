<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Nudge;

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

        $status = $validated['draft'] === true ? NudgeStatus::DRAFT : $nudge->status;

        $nudge->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'code' => $validated['code'],
            'status' => $status,
        ]);

        return redirect()->route('admin.index');
    }
}
