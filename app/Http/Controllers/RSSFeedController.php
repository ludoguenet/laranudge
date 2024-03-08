<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Nudge;
use Illuminate\Http\Response;

class RSSFeedController extends Controller
{
    public function __invoke(): Response
    {
        $nudges = Nudge::query()
            ->validated()
            ->latest()
            ->get();

        return response()->view('rss', [
            'nudges' => $nudges,
        ])->header('Content-Type', 'text/xml');
    }
}
