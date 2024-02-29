<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class DashBoardController extends Controller
{
    public function __invoke(): View
    {
        /** @var User $user */
        $user = auth()->user();

        $nudges = $user->nudges()->latest()->get();

        return view('dashboard', [
            'nudges' => $nudges,
        ]);
    }
}
