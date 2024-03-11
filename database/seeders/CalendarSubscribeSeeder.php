<?php

namespace Database\Seeders;

use App\Models\CalendarSubscribeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarSubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CalendarSubscribeModel::factory()
            ->count(10)
            ->create();
    }
}
