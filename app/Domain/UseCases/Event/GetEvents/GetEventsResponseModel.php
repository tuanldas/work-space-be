<?php

namespace App\Domain\UseCases\Event\GetEvents;
class GetEventsResponseModel
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
