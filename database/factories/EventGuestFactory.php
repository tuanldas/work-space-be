<?php

namespace Database\Factories;

use App\Models\EventModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventGuestFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'event_id' => EventModel::factory(),
            'user_id' => User::factory(),
        ];
    }
}
