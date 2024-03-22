<?php

namespace Database\Factories;

use App\Models\EventModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventRepeatModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'event_id' => EventModel::factory(),
            'repeating_pattern' => 1,
        ];
    }
}
