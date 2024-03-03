<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Likeable
{
    /**
     * @return MorphMany<Like>
     */
    public function likes(): MorphMany;
}
