<?php

declare(strict_types=1);

namespace App\Actions\Nudge;

class GenerateRandomSynonym
{
    public function handle(): string
    {
        $synonyms = collect([
            'awesome',
            'amazing',
            'incredible',
            'fantastic',
            'phenomenal',
            'stellar',
            'superb',
            'excellent',
            'outstanding',
            'marvelous',
            'splendid',
            'wonderful',
            'brilliant',
            'awe-inspiring',
            'dope',
            'rad',
            'majestic',
            'legendary',
            'top-notch',
            'formidable',
            'breathtaking',
            'stunning',
            'sublime',
            'astonishing',
            'surprising',
            'staggering',
            'sensational',
            'exceptional',
            'grandiose',
            'eloquent',
            'epic',
            'impeccable',
            'radiant',
            'moving',
            'fabulous',
            'divine',
            'mind-blowing',
            'splendiferous',
            'out of this world',
        ]);

        return $synonyms->random();
    }
}
