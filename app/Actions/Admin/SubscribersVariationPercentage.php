<?php

declare(strict_types=1);

namespace App\Actions\Admin;

use App\Models\User;

class SubscribersVariationPercentage
{
    public function handle(): int
    {
        $subscribersPreviousMonthCount = User::query()
            ->verified()
            ->whereMonth('created_at', now()->subMonthNoOverflow())
            ->count();

        $subscribersCurrentMonthCount = User::query()
            ->verified()
            ->whereMonth('created_at', now()->month)
            ->count();

        if ($subscribersPreviousMonthCount === 0) {
            return 0;
        }

        return (($subscribersCurrentMonthCount - $subscribersPreviousMonthCount) / $subscribersPreviousMonthCount) * 100;
    }
}
