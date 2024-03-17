<?php

declare(strict_types=1);

namespace App\Enums\Nudge;

enum NudgeStatus: string
{
    CASE NOT_VALIDATED = 'not_validated';
    CASE DRAFT = 'draft';
    CASE VALIDATED = 'validated';
}