<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Nudge;

use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(
        Nudge $nudge,
        Request $request,
    ): RedirectResponse {
        $validated = $request->validate([
            'title' => ['required', 'unique:nudges,title,'.$nudge->id, 'min:3', 'max:100'],
            'content' => 'required|string|min:10|max:500',
            'code' => 'required|string',
        ]);

        $nudge->update($validated);

        return redirect()->back()->with('status', 'nudge-edited');
    }
}
