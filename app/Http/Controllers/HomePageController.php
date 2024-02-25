<?php

namespace App\Http\Controllers;

use App\Models\Nudge;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
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
