<?php

declare(strict_types=1);

use App\Enums\Nudge\NudgeStatus;
use App\Models\Nudge;
use App\Models\User;
use Illuminate\Support\Str;

use function Pest\Laravel\actingAs;

it('can update a nudge', function () {
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

it('can not update a nudge', function () {
    $admin = User::factory()->admin()->create();
    $nudge = Nudge::factory()->create();

    actingAs($admin)
        ->put(route('admin.nudges.update', $nudge))
        ->assertRedirect()
        ->assertSessionHasErrors();
});

it('can update a nudge in drafts', function (NudgeStatus $status, bool $draft) {
    $admin = User::factory()->admin()->create();
    $nudge = Nudge::factory()->create(['status' => $status]);

    $title = Str::random();
    $slug = Str::slug($title);
    $content = Str::random();
    $code = Str::random();

    actingAs($admin)
        ->put(route('admin.nudges.update', $nudge), [
            'title' => $title,
            'content' => $content,
            'code' => $code,
            'draft' => $draft,
        ])
        ->assertRedirect();

    $nudge->refresh();

    expect($nudge->title)->toBe($title);
    expect($nudge->slug)->toBe($slug);
    expect($nudge->content)->toBe($content);
    expect($nudge->code)->toBe($code);

    if ($draft === true) {
        $nudge->status === NudgeStatus::DRAFT;
    } else {
        $nudge->status === $status;
    }

})
    ->with(NudgeStatus::cases())
    ->with([true, false]);
