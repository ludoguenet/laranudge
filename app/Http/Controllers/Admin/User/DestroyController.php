<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Nudge;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

final class DestroyController extends Controller
{
    public function __invoke(
        User $user,
    ): RedirectResponse {
        Like::query()
            ->whereBelongsTo($user)
            ->delete();

        Nudge::query()
            ->whereBelongsTo($user)
            ->delete();

        $user->delete();

        return redirect()->back();
    }
}
