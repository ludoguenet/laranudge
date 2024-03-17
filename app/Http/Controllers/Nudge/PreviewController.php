<?php

declare(strict_types=1);

namespace App\Http\Controllers\Nudge;

use App\Actions\Nudge\GenerateRandomSynonym;
use App\Http\Controllers\Controller;
use App\Models\Nudge;
use App\Models\User;
use Illuminate\View\View;

class PreviewController extends Controller
{
    public function __invoke(
        Nudge $nudge,
    ): View {
        /** @var User $user */
        $user = auth()->user();

        abort_unless($user->isAdmin() || auth()->id() === $nudge->user_id, 404);

        $randomSynonym = (new GenerateRandomSynonym)->handle();

        return view('nudges.show', [
            'nudge' => $nudge->loadCount('likes'),
            'randomSynonym' => $randomSynonym,
            'preview' => true,
        ]);
    }
}
