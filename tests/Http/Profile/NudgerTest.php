<?php

declare(strict_types=1);

use App\Enums\Nudge\NudgeStatus;
use App\Models\Nudge;
use App\Models\User;

use function Pest\Laravel\get;

it('can show right counts in nudger profile', function (): void {
    $user = User::factory()
        ->has(
            Nudge::factory(4)
                ->sequence(
                    ['created_at' => now()],
                    ['created_at' => now()->subMonths(2)],
                )
                ->validated()
        )
        ->create();

    $nudges = Nudge::factory(6)
        ->sequence(
            ['status' => NudgeStatus::VALIDATED],
            ['status' => NudgeStatus::NOT_VALIDATED],
        )
        ->create();

    $nudges->each(fn (Nudge $nudge) => $user->like($nudge));

    get(route('nudger', $user->name))
        ->assertOk()
        ->assertViewHas('totalNudges', 4)
        ->assertViewHas('monthlyNudges', 2)
        ->assertViewHas('likedNudges', 3);
});
