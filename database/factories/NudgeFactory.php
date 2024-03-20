<?php

namespace Database\Factories;

use App\Enums\Nudge\NudgeStatus;
use App\Models\Nudge;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nudge>
 */
class NudgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = Str::random();
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => Str::random(),
            'code' => Str::random(),
            'user_id' => User::factory(),
        ];
    }

    public function validated(): static
    {
        return $this->state(fn () => [
            'status' => NudgeStatus::VALIDATED,
        ]);
    }

    public function draft(): static
    {
        return $this->state(fn () => [
            'status' => NudgeStatus::DRAFT,
        ]);
    }

    public function notValidated(): static
    {
        return $this->state(fn () => [
            'status' => NudgeStatus::NOT_VALIDATED,
        ]);
    }

    public function liked(
        int $likedCount = 1
    ): Factory {
        return $this->state(fn () => [])
            ->afterCreating(function (Nudge $nudge) use ($likedCount) {
                User::factory($likedCount)
                    ->create()
                    ->each(fn (User $user) => $user->like($nudge));
            });
    }
}
