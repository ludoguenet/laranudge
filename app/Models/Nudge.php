<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasLikes;
use App\Contracts\Likeable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Nudge extends Model implements Likeable
{
    use HasFactory;
    use HasLikes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'code',
        'validated',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'validated' => 'boolean',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function (Nudge $model) {
            /** @var string title */
            $title = $model->title;
            $model->slug = Str::slug($title);
        });

        static::updating(function (Nudge $model) {
            /** @var string title */
            $title = $model->title;
            $model->slug = Str::slug($title);
        });
    }

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

    protected function getEscapedContentAttribute(): string
    {
        return Str::markdown($this->attributes['content'], [
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
        ]);
    }
}
