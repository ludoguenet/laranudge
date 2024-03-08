<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Nudge;

use App\Http\Controllers\Controller;
use App\Models\Nudge;
use App\Models\User;
use Illuminate\Http\Response;

class ToggleLikeController extends Controller
{
    public function __invoke(
        Nudge $nudge,
    ): Response {
        /** @var User $user */
        $user = auth()->user();

        if ($user->isLiked($nudge)) {
            $user->unlike($nudge);
        } else {
            $user->like($nudge);
        }

        return response()->noContent();
    }
}
