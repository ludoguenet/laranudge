<?php

declare(strict_types=1);

arch('app')
    ->expect('App')
    ->toUseStrictTypes();

arch('globals')
    ->expect(['dd', 'dump'])
    ->not->toBeUsed();
