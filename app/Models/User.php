<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Likeable;
use App\Notifications\VerifyEmailQueued;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property DatabaseNotificationCollection $unreadNotifications
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'admin' => 'boolean',
    ];

    /**
     * @return HasMany<Nudge>
     */
    public function nudges(): HasMany
    {
        return $this->hasMany(Nudge::class);
    }

    /**
     * @return HasMany<Like>
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function like(Likeable $likeable): void
    {
        (new Like())
            ->user()->associate($this)
            ->likeable()->associate($likeable)
            ->save();
    }

    public function unlike(Likeable $likeable): void
    {
        $likeable
            ->likes()
            ->whereHas('user', fn ($query) => $query->where('id', $this->id))
            ->delete();
    }

    public function isLiked(Likeable $likeable): bool
    {
        return $likeable
            ->likes()
            ->whereHas('user', fn ($query) => $query->where('id', $this->id))
            ->exists();
    }

    public function isAdmin(): bool
    {
        return $this->admin === true;
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmailQueued);
    }
}
