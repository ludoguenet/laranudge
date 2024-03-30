<?php

declare(strict_types=1);

namespace App\Enums\Socialite;

enum Provider: string
{
    case GITHUB = 'github';
    case GOOGLE = 'google';
}
