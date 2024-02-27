<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nudge extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'code',
        'user_id',
    ];

    /**
     * @return BelongsTo<User, Nudge>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param  Builder<Nudge>  $query
     */
    public function scopeValidated(
        Builder $query,
    ): void {
        $query->where('validated', true);
    }
}
