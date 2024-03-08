<?php

declare(strict_types=1);

namespace App\Http\Controllers\Nudge;

use App\Actions\Nudge\GenerateRandomSynonym;
use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function __invoke(
        Nudge $nudge,
    ): View {
        abort_if(! $nudge->validated, 404);

        $randomSynonym = (new GenerateRandomSynonym)->handle();

        return view('nudges.show', [
            'nudge' => $nudge->loadCount('likes'),
            'randomSynonym' => $randomSynonym,
        ]);
    }
}
