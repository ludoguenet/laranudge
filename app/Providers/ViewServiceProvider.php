<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Nudge;
use App\Models\User;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // ...
    }

    public function boot(): void
    {
        Facades\View::composer('dashboard', function ($view): void {
            /** @var User $user */
            $user = auth()->user();
            $user->unreadNotifications->markAsRead();
        });

        Facades\View::composer('layouts.navigation', function ($view): void {
            /** @var ?User $user */
            $user = auth()->user();

            $nudges = Nudge::query()
                ->with('user')
                ->validated()
                ->get();

            $view->with([
                'notificationCount' => (int) ($user ? $user->refresh()->unreadNotifications->count() : 0),
                'nudges' => $nudges,
            ]);
        });
    }
}
