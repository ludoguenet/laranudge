<?php

namespace App\Http\Controllers\Nudge;

use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Nudge $nudge)
    {
        $nudge->delete();

        return redirect()->back();
    }
}
