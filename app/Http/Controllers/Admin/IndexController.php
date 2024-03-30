<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\SubscribersVariationPercentage;
use App\Http\Controllers\Controller;
use App\Models\Nudge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(Request $request): View
    {
        $nudges = Nudge::query()
            ->with('user')
            ->latest()
            ->get();

        $subscribersCount = User::query()
            ->verified()
            ->count();

        $subscribersVariationPercentage = (new SubscribersVariationPercentage)->handle();

        return view('admin.index', [
            'nudges' => $nudges,
            'subscribersCount' => $subscribersCount,
            'subscribersVariationPercentage' => $subscribersVariationPercentage,
        ]);
    }
}
