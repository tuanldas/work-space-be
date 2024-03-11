<?php

namespace Database\Seeders;

use App\Models\EventGuestModel;
use Illuminate\Database\Seeder;

class EventGuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventGuestModel::factory()->count(10)->create();
    }
}
