<?php

declare(strict_types=1);

use App\Models\Nudge;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('can validate nudges', function (): void {
    $user = User::factory()->admin()->create();
    $nudge = Nudge::factory()->notValidated()->create();

    actingAs($user)
        ->put(route('api.admin.nudges.validate', $nudge))
        ->assertNoContent();

    expect($nudge->refresh()->validated())->toBeTrue();
});

it('can not validate nudges', function (): void {
    $user = User::factory()->create();
    $nudge = Nudge::factory()->notValidated()->create();

    actingAs($user)
        ->put(route('api.admin.nudges.validate', $nudge))
        ->assertRedirect();

    expect($nudge->refresh()->validated())->toBeFalse();
});
