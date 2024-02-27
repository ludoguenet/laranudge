<?php

declare(strict_types=1);

namespace App\Http\Controllers\Nudge;

use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\Http\RedirectResponse;

class DestroyController extends Controller
{
    public function __invoke(
        Nudge $nudge
    ): RedirectResponse {
        $nudge->delete();

        return redirect()->back();
    }
}
