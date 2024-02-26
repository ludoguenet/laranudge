<?php

namespace App\Http\Controllers\Nudge;

use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(
        Nudge $nudge
    ): RedirectResponse {
        $nudge->delete();

        return redirect()->back();
    }
}
