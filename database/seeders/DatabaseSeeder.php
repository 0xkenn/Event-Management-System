<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\University;
use App\Models\User;
use App\Models\Venue;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        //seed university table
        University::create(['name' => 'Biliran Province State University']);


        //seed venue table
        Venue::create(['university_id' => 1, 'name' => 'BiPSU Gym']);
        Venue::create(['university_id' => 1, 'name' => 'Student Lounge']);
        Venue::create(['university_id' => 1, 'name' => 'Student Center']);
        Venue::create(['university_id' => 1, 'name' => 'Student Space']);
        Venue::create(['university_id' => 1, 'name' => 'HyFlex']);
        Venue::create(['university_id' => 1, 'name' => 'BiPSU  Hostel']);
        Venue::create(['university_id' => 1, 'name' => 'Sports Center']);
    }
}
