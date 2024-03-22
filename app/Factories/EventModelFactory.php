<?php

namespace App\Factories;

use App\Domain\Interfaces\Event\EventEntity;
use App\Domain\Interfaces\Event\EventFactory;
use App\Models\EventModel;
use Carbon\Carbon;

class EventModelFactory implements EventFactory
{
    public function make(array $attributes = []): EventEntity
    {
        if (isset($attributes['start_time']) && is_string($attributes['start_time'])) {
            $attributes['start_time'] = Carbon::parse($attributes['start_time'])->utc;
        }
        if (isset($attributes['end_time']) && is_string($attributes['end_time'])) {
            $attributes['end_time'] = Carbon::parse($attributes['end_time'])->utc;
        }
        return new EventModel($attributes);
    }
}
