<?php

declare(strict_types=1);

namespace App\Enums\Nudge;

enum NudgeStatus: string
{
    case NOT_VALIDATED = 'not_validated';
    case DRAFT = 'draft';
    case VALIDATED = 'validated';

    public function label(): string
    {
        return match ($this) {
            self::NOT_VALIDATED => 'waiting for validation',
            self::DRAFT => 'draft',
            self::VALIDATED => 'validated',
        };
    }

    public function colour(): string
    {
        return match ($this) {
            self::NOT_VALIDATED => 'yellow',
            self::DRAFT => 'blue',
            self::VALIDATED => 'green',
        };
    }
}
