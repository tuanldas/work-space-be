<?php

namespace Database\Factories;

use App\Models\EventModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventReminderModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'event_id' => EventModel::factory(),
            'type' => 1,
            'interval' => 1,
            'unit' => 'days',
        ];
    }
}
