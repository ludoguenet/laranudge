<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Nudge;
use Illuminate\Support\Str;

class NudgeObserver
{
    /**
     * Handle the Nudge "creating" event.
     */
    public function creating(Nudge $nudge): void
    {
        /** @var string title */
        $title = $nudge->title;
        $nudge->slug = Str::slug($title);
    }

    /**
     * Handle the Nudge "updating" event.
     */
    public function updating(Nudge $nudge): void
    {
        /** @var string title */
        $title = $nudge->title;
        $nudge->slug = Str::slug($title);
    }
}
