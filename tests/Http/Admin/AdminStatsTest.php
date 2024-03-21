<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\actingAs;

it('can view subscribers count', function (): void {
    $user = User::factory()->admin()->create();
    User::factory()->create();
    User::factory()->subscribedTwoMonthsAgo()->create();

    User::factory(2)->unverified()->create();

    actingAs($user)
        ->get(route('admin.index'))
        ->assertOk()
        ->assertViewHas('subscribersCount', 3)
        ->assertViewHas('subscribersMonthlyCount', 2);
});
