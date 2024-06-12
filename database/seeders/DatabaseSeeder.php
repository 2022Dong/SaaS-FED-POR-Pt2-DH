<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class, // it needs to come first.
            UserSeeder::class,
            ListingSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Listing::factory()->create([
            'title' => 'web developer',
            'description' => 'n/a',
        ]);
    }
}
