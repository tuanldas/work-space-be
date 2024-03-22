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

    public function getEventsByDate(string $getStartDate, string $getEndDate)
    {
        return $this->model
            ->whereBetween( 'start_time', [$getStartDate, $getEndDate])
            ->select([
                'id',
                'uuid',
                'title',
                'start_time',
                'end_time',
            ])
            ->get();
    }
}
