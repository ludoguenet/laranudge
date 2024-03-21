<?php

use App\Models\Nudge;

use function Pest\Laravel\get;

it('can display the most liked nudges', function (): void {
    $most = Nudge::factory()->validated()->liked(10)->create(['title' => 'mostLikedNudges']);
    $less = Nudge::factory()->validated()->liked(5)->create(['title' => 'lessLikedNudge']);
    $not = Nudge::factory()->validated()->create(['title' => 'notLikedNudge']);

    get(route('most-liked-nudges'))
        ->assertOk()
        ->assertViewIs('nudges.most-liked')
        ->assertViewHasAll([
            'nudges',
        ])
        ->assertSeeInOrder([
            $most->title,
            $less->title,
            $not->title,
        ]);
});
