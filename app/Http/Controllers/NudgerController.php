<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Nudge;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

class NudgerController extends Controller
{
    public function __invoke(
        User $user,
    ): View {
        $totalNudges = Nudge::query()
            ->validated()
            ->whereBelongsTo($user)
            ->count();

        $monthlyNudges = Nudge::query()
            ->validated()
            ->whereBelongsTo($user)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $likedNudges = Like::query()
            ->where('user_id', $user->id)
            ->whereHas('likeable', fn ($query) => $query->validated())
            ->count();

        return view('profile.nudger', [
            'user' => $user,
            'totalNudges' => $totalNudges,
            'monthlyNudges' => $monthlyNudges,
            'likedNudges' => $likedNudges,
        ]);
    }
}
