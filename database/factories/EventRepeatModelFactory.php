<?php

namespace Database\Factories;

use App\Models\EventModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventRepeatModel>
 */
class EventRepeatModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'event_id' => EventModel::factory(),
            'repeating_pattern' => 1,
        ];
    }
}
