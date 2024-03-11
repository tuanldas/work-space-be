<?php

namespace Database\Seeders;

use App\Models\EventReminderModel;
use Illuminate\Database\Seeder;

class EventReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventReminderModel::factory()->count(10)->create();
    }
}
