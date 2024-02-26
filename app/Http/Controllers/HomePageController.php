<?php

namespace App\Http\Controllers;

use App\Models\Nudge;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function __invoke(): View
    {
        $synonyms = collect([
            'awesome',
            'amazing',
            'incredible',
            'fantastic',
            'phenomenal',
            'stellar',
            'superb',
            'excellent',
            'outstanding',
            'marvelous',
            'splendid',
            'wonderful',
            'brilliant',
            'awe-inspiring',
            'dope',
            'rad',
            'majestic',
            'legendary',
            'top-notch',
        ]);

        $randomSynonym = $synonyms->random();

        return view('homepage', [
            'nudge' => Nudge::inRandomOrder()->first(),
            'randomSynonym' => $randomSynonym,
        ]);
    }
}
