<?php

declare(strict_types=1);

use App\Models\Nudge;
use App\Models\User;

use function Pest\Laravel\get;

it('can show right counts in nudger profile', function () {
    $user = User::factory()
        ->has(
            Nudge::factory(4)
                ->sequence(
                    ['created_at' => now()],
                    ['created_at' => now()->subMonths(2)],
                )
                ->state(['validated' => true])
        )
        ->create();

    $nudges = Nudge::factory(6)
        ->sequence(
            ['validated' => true],
            ['validated' => false],
        )
        ->create();

    $nudges->each(fn (Nudge $nudge) => $user->like($nudge));

    get(route('nudger', $user->name))
        ->assertOk()
        ->assertViewHas('totalNudges', 4)
        ->assertViewHas('monthlyNudges', 2)
        ->assertViewHas('likedNudges', 3);
});
