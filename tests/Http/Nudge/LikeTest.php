<?php

declare(strict_types=1);

use App\Models\Like;
use App\Models\Nudge;
use App\Models\User;

use function Pest\Laravel\assertDatabaseCount;

it('can like nudges', function () {
    $nudge = Nudge::factory()->create();
    $user = User::factory()->create();

    $user->like($nudge);

    $like = Like::first();

    assertDatabaseCount('likes', 1);

    expect($like)->not->tobeNull();
    expect($like->user_id)->toBe($user->id);
    expect($like->likeable_id)->toBe($nudge->id);
    expect($like->likeable_type)->toBe(get_class($nudge));
});

it('can unlike nudges', function () {
    $nudge = Nudge::factory()->create();
    $user = User::factory()->create();

    $user->like($nudge);
    $user->unlike($nudge);

    assertDatabaseCount('likes', 0);
});

it('can determine if liked', function () {
    $nudge = Nudge::factory()->create();
    $user = User::factory()->create();

    $user->like($nudge);

    expect($user->isLiked($nudge))->toBeTrue();
});

it('can determine if not liked', function () {
    $nudge = Nudge::factory()->create();
    $user = User::factory()->create();

    expect($user->isLiked($nudge))->toBeFalse();
});
