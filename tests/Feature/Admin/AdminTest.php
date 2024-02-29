<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\actingAs;

it('can access admin', function () {
    $user = User::factory()->admin()->create();

    actingAs($user)
        ->get(route('admin.index'))
        ->assertOk();
});

it('can not access admin', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.index'))
        ->assertRedirect();
});
