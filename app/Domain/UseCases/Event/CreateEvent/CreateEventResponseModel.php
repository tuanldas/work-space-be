<?php

namespace App\Domain\UseCases\Event\CreateEvent;
class CreateEventResponseModel
{
    public function __construct(
        private array $events
    )
    {
    }

    public function getEvents(): array
    {
        return $this->events;
    }
}
