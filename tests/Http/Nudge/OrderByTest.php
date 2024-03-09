<?php

it('can search')->todo();

it('can see nudges displayed and sorted properly', function () {
    // test('can see posts sorted by title', function (string $direction) {
    //     $posts = Post::factory(3)
    //         ->sequence(
    //             ['title' => 'abc'],
    //             ['title' => 'bcd'],
    //             ['title' => 'cde'],
    //         )
    //         ->create();

    //     $expectedSortedPosts = ($direction === 'asc')
    //         ? $posts->pluck('title')->all()
    //         : $posts->pluck('title')->reverse()->all();

    //     get(route('posts.index', [
    //         'sortBy' => 'title',
    //         'direction' => $direction,
    //     ]))
    //         ->assertOk()
    //         ->assertSessionHas('posts.index.previous.query', [
    //             'sortBy' => 'title',
    //             'direction' => $direction,
    //         ])
    //         ->assertViewIs('posts.index')
    //         ->assertViewHasAll([
    //             'posts',
    //         ])
    //         ->assertSeeTextInOrder($expectedSortedPosts);
    // })->with(['asc', 'desc']);
})->todo();
