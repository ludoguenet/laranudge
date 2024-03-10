<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Nudge;

use Illuminate\Support\Str;
use function Pest\Laravel\actingAs;

it('can edit a nudge', function () {
    $admin = User::factory()->admin()->create();
    $nudge = Nudge::factory()->create();

    $title = Str::random();
    $slug = Str::slug($title);
    $content = Str::random();
    $code = Str::random();

    actingAs($admin)
        ->put(route('admin.nudges.update', $nudge), [
            'title' => $title,
            'content' => $content,
            'code' => $code,
        ])
        ->assertRedirect();

    $nudge->refresh();

    expect($nudge->title)->toBe($title);
    expect($nudge->slug)->toBe($slug);
    expect($nudge->content)->toBe($content);
    expect($nudge->code)->toBe($code);
});

it('can not edit a nudge', function () {
    $admin = User::factory()->admin()->create();
    $nudge = Nudge::factory()->create();

    actingAs($admin)
        ->put(route('admin.nudges.update', $nudge))
        ->assertRedirect()
        ->assertSessionHasErrors();
});