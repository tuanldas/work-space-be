<?php

namespace Database\Seeders;

use App\Models\CalendarModel;
use Illuminate\Database\Seeder;

class CalendarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CalendarModel::factory()
            ->count(10)
            ->create();
    }
}
