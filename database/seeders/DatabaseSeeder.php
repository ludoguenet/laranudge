<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Laravel Jutsu',
            'email' => 'd45h83@gmail.com',
            'admin' => true,
        ]);
        $this->call(NudgesTableSeeder::class);
        $this->call(LikesTableSeeder::class);
    }
}
