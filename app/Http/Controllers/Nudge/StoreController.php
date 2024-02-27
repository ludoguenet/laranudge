<?php

declare(strict_types=1);

namespace App\Http\Controllers\Nudge;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'code' => 'required|string',
        ]);

        /** @var User $user */
        $user = auth()->user();

        $user->nudges()->create([
            'content' => $validated['content'],
            'code' => $validated['code'],
        ]);

        return redirect()->back()->with('status', 'nudge-created');
    }
}
