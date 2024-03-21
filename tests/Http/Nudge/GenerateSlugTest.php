<?php

declare(strict_types=1);

use App\Models\Nudge;
use App\Models\User;
use Illuminate\Support\Str;

it('generates slug when nudge is created', function (): void {
    $nudge = new Nudge([
        'title' => 'Hello World',
        'content' => Str::random(),
        'code' => Str::random(),
        'validated' => false,
        'user_id' => User::factory()->create()->id,
    ]);

    $nudge->save();
    $nudge->refresh();

    expect($nudge->slug)->toBe('hello-world');
});

it('generates slug when nudge is updated', function (): void {
    $nudge = new Nudge([
        'title' => 'Hello World',
        'content' => Str::random(),
        'code' => Str::random(),
        'validated' => false,
        'user_id' => User::factory()->create()->id,
    ]);

    $nudge->save();

    $nudge->update([
        'title' => 'Hello Universe',
    ]);

    expect($nudge->slug)->toBe('hello-universe');
});
