<?php

declare(strict_types=1);

use App\Models\Nudge;
use App\Models\User;
use Illuminate\Support\Str;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;

it('can update a nudge in drafts', function (bool $draft) {
    $user = User::factory()->create();
    $nudge = Nudge::factory()
        ->for($user)
        ->draft()
        ->create();

    $title = Str::random();
    $slug = Str::slug($title);
    $content = Str::random();
    $code = Str::random();

    actingAs($user)
        ->put(route('nudges.update', $nudge), [
            'title' => $title,
            'content' => $content,
            'code' => $code,
            'draft' => $draft,
        ])
        ->assertRedirect();

    assertDatabaseCount('nudges', 1);

    $nudge = Nudge::first();

    expect($nudge->title)->toBe($title);
    expect($nudge->slug)->toBe($slug);
    expect($nudge->content)->toBe($content);
    expect($nudge->code)->toBe($code);
    expect($nudge->user_id)->toBe($user->id);

    if ($draft === true) {
        expect($nudge->draft())->toBeTrue();
    } else {
        expect($nudge->notValidated())->toBeTrue();
    }

})->with([true, false]);
