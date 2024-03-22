<?php

namespace Database\Factories;

use App\Models\CalendarModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'event_person' => User::factory(),
            'calendar_id' => CalendarModel::factory(),
            'title' => $this->faker->sentence,
            'start_time' => $this->faker->dateTimeThisMonth(),
            'end_time' =>  $this->faker->dateTimeThisMonth(),
        ];
    }
}
