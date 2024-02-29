<?php

declare(strict_types=1);

use App\Models\Nudge;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('can validate nudges', function () {
    $user = User::factory()->admin()->create();
    $nudge = Nudge::factory()->create();

    actingAs($user)
        ->put(route('api.nudges.toggle', $nudge))
        ->assertOk();

    expect($nudge->refresh()->validated)->toBeTrue();
});

it('can not validate nudges', function () {
    $user = User::factory()->create();
    $nudge = Nudge::factory()->create();

    actingAs($user)
        ->put(route('api.nudges.toggle', $nudge))
        ->assertRedirect();

    expect($nudge->refresh()->validated)->toBeFalse();
});
