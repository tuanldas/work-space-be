<?php

namespace App\Repositories;

use App\Models\EventModel;
use App\Repositories\Interface\EventRepositoryInterface;

class EventRepository extends EloquentRepository implements EventRepositoryInterface
{
    public function getModel(): string
    {
        return EventModel::class;
    }

    public function getEventsByDate(int $userId, string $getStartDate, string $getEndDate)
    {
        return $this->model
            ->leftJoin('event_guests', 'events.id', '=', 'event_guests.event_id')
            ->whereBetween('start_time', [$getStartDate, $getEndDate])
            ->where('user_id', $userId)
            ->select([
                'events.id',
                'events.uuid',
                'events.title',
                'events.start_time',
                'events.end_time',
            ])
            ->get();
    }
}
