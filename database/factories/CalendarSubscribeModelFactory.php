<?php

namespace Database\Factories;

use App\Models\CalendarModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CalendarSubscribeModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'subscribers' => User::factory(),
            'calendar_id' => CalendarModel::factory(),
            'color' => $this->randColor(),
        ];
    }

    private function randColor(): string
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}
