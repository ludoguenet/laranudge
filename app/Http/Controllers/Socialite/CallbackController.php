<?php

declare(strict_types=1);

namespace App\Http\Controllers\Socialite;

use App\Enums\Socialite\Provider;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

final class CallbackController extends Controller
{
    public function __invoke(
        Provider $provider,
    ): RedirectResponse {
        $provider = $provider->value;

        try {
            $providerUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('login');
        }

        $user = User::firstWhere([
            'provider' => $provider,
            'provider_id' => $providerUser->getId(),
        ]);

        if ($user === null) {
            $validator = Validator::make(
                ['email' => $providerUser->getEmail()],
                ['email' => ['unique:users,email']],
                ['unique' => 'Unable to log in. You might have used a different login method.'],
            );

            if ($validator->fails()) {
                return redirect()->route('login')->withErrors($validator);
            }

            $user = User::create([
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'email_verified_at' => now(),
            ]);
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
