<?php

declare(strict_types=1);

use App\Models\Nudge;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('can preview as admin', function (): void {
    $admin = User::factory()->admin()->create();
    $nudge = Nudge::factory()->create();

    actingAs($admin)
        ->get(route('nudges.preview', $nudge->slug))
        ->assertOk();
});

it('can preview as nudge author', function (): void {
    $nudge = Nudge::factory()->create();

    actingAs($nudge->user)
        ->get(route('nudges.preview', $nudge->slug))
        ->assertOk();
});

it('can not preview nudge', function (): void {
    $nudge = Nudge::factory()->create();

    actingAs(User::factory()->create())
        ->get(route('nudges.preview', $nudge->slug))
        ->assertNotFound();
});
