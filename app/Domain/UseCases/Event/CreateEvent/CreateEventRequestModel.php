<?php

namespace App\Domain\UseCases\Event\CreateEvent;

use Carbon\Carbon;

class CreateEventRequestModel
{
    /**
     * @param array{
     *     start_time: Carbon,
     *     end_time: Carbon,
     *     title: string,
     *     calendar_id: numeric,
     *     event_person: numeric
     * } $attributes
     */
    public function __construct(
        private readonly array $attributes,
    )
    {
    }

    public function getStartTime(): string
    {
        return $this->attributes['start_time'];
    }

    public function getEndTime(): string
    {
        return $this->attributes['end_time'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function getCalendarId(): int|null
    {
        return $this->attributes['calendar_id'];
    }

    public function getEventPerson(): int|null
    {
        return $this->attributes['event_person'];
    }
}
