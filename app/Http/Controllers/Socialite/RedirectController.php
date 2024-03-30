<?php

declare(strict_types=1);

namespace App\Http\Controllers\Socialite;

use App\Enums\Socialite\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class RedirectController extends Controller
{
    public function __invoke(
        Provider $provider,
    ): SymfonyRedirectResponse|RedirectResponse {
        return Socialite::driver($provider->value)->redirect();
    }
}
