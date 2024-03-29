<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CalendarsSeeder::class,
            CalendarSubscribeSeeder::class,
            EventSeeder::class,
            EventGuestSeeder::class,
            EventReminderSeeder::class,
        ]);
    }
}
