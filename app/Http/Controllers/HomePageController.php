<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Nudge\GenerateRandomSynonym;
use App\Models\Nudge;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function __invoke(): View
    {
        $randomSynonym = (new GenerateRandomSynonym)->handle();

        $randomNudge = Nudge::query()
            ->withCount('likes')
            ->validated()
            ->inRandomOrder()
            ->first();

        return view('homepage', [
            'nudge' => $randomNudge,
            'randomSynonym' => $randomSynonym,
        ]);
    }
}
