<?php

declare(strict_types=1);

use App\Models\Nudge;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;

it('can display users', function (): void {
    $user = User::factory()->admin()->create();

    User::factory(10)->create();

    actingAs($user)
        ->get(route('admin.users.index'))
        ->assertOk()
        ->assertSeeInOrder(User::query()->where('admin', false)->latest()->pluck('name')->all());
});

it('can destroy users', function (): void {
    $admin = User::factory()->admin()->create();

    $user = User::factory()->create();
    $nudge = Nudge::factory()->for($user)->create();
    $user->like($nudge);

    actingAs($admin)
        ->delete(route('admin.users.destroy', $user))
        ->assertRedirect();

    assertDatabaseCount('users', 1);
    assertDatabaseCount('likes', 0);
    assertDatabaseCount('nudges', 0);
});
