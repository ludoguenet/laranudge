<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Nudge;

use App\Http\Controllers\Controller;
use App\Models\Nudge;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Nudge $nudge): View
    {
        return view('nudges.edit', [
            'nudge' => $nudge,
        ]);
    }
}
