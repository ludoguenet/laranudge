<?php

declare(strict_types=1);

namespace App\Http\Controllers\Nudge;

use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\View\View;

class MostLikedNudgesController extends Controller
{
    public function __invoke(): View
    {
        $nudges = Nudge::query()
            ->with('user')
            ->withCount('likes')
            ->validated()
            ->orderByDesc('likes_count')
            ->get();

        return view('nudges.most-liked', [
            'nudges' => $nudges,
        ]);
    }
}
