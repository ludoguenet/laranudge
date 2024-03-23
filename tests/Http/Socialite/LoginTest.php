<?php

declare(strict_types=1);

use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;
use Mockery\MockInterface;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\get;

it('can handle successful socialite authentication', function (): void {
    $user = mock(User::class, function (MockInterface $mock): void {
        $mock->id = fake()->randomDigit;
        $mock->name = fake()->name;
        $mock->email = fake()->email;
    });

    $provider = $this->mock(Provider::class, function (MockInterface $mock) use ($user): void {
        $mock
            ->shouldReceive('user')
            ->andReturn($user);
    });

    Socialite::shouldReceive('driver')
        ->with('github')
        ->andReturn($provider);

    get(route('auth-provider-callback', 'github'));

    assertAuthenticated();
});
