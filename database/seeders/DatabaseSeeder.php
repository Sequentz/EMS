<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\EventRegistration;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Maak 10 gebruikers aan
        User::factory()->count(10)->create()->each(function ($user) {
            // Voor elke gebruiker, maak 3 evenementen aan
            Event::factory()->count(3)->create(['user_id' => $user->id])->each(function ($event) {
                // Voor elk evenement, maak 5 registraties aan
                EventRegistration::factory()->count(5)->create(['event_id' => $event->id]);
            });
        });
    }
}
