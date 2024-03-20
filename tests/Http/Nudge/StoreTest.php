<?php

declare(strict_types=1);

use App\Models\Nudge;
use App\Models\User;
use Illuminate\Support\Str;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;

it('can store a nudge', function () {
    $user = User::factory()->create();

    $title = Str::random();
    $slug = Str::slug($title);
    $content = Str::random();
    $code = Str::random();

    actingAs($user)
        ->post(route('nudges.store'), [
            'title' => $title,
            'content' => $content,
            'code' => $code,
            'draft' => false,
        ])
        ->assertRedirect();

    assertDatabaseCount('nudges', 1);

    $nudge = Nudge::first();

    expect($nudge->title)->toBe($title);
    expect($nudge->slug)->toBe($slug);
    expect($nudge->content)->toBe($content);
    expect($nudge->code)->toBe($code);
    expect($nudge->draft())->toBeFalse();
    expect($nudge->user_id)->toBe($user->id);
});

it('can not store a nudge', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('nudges.store'))
        ->assertRedirect()
        ->assertSessionHasErrors();

    assertDatabaseCount('nudges', 0);
});
