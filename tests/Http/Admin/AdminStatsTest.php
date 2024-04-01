<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\actingAs;

it('can display subscribers count', function (): void {
    $user = User::factory()->admin()->create();
    User::factory()->create();
    User::factory()->subscribedTwoMonthsAgo()->create();

    User::factory(2)->unverified()->create();

    actingAs($user)
        ->get(route('admin.index'))
        ->assertOk()
        ->assertViewHas('subscribersCount', 3);
});

it('can display correct subscribers variation percentage', function (int $previousMonthSubscribersCount, int $expected): void {
    $user = User::factory()->admin()->create();
    User::factory()->create();

    if ($previousMonthSubscribersCount !== 0) {
        User::factory($previousMonthSubscribersCount)->subscribedMonthAgo()->create();
    }

    User::factory()->subscribedTwoMonthsAgo()->create();
    User::factory(2)->unverified()->create();

    actingAs($user)
        ->get(route('admin.index'))
        ->assertOk()
        ->assertViewHas('subscribersVariationPercentage', $expected);
})
    ->with([
        [0, 0],
        [1, 100],
        [2, 0],
    ]);

it('can display correct subscribers variation percentage as integer', function (): void {
    $user = User::factory()->admin()->create();
    User::factory(2)->subscribedMonthAgo()->create();

    actingAs($user)
        ->get(route('admin.index'))
        ->assertOk()
        ->assertViewHas('subscribersVariationPercentage', -50);
});
