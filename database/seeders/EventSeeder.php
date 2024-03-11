<?php

namespace Database\Seeders;

use App\Models\EventModel;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventModel::factory()->count(10)->create();
    }
}
