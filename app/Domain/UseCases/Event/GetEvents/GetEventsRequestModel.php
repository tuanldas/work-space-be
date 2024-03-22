<?php

namespace App\Domain\UseCases\Event\GetEvents;
class GetEventsRequestModel
{
    public function __construct(
        private $attributes,
    )
    {
    }

    public function getStartDate(): string
    {
        return $this->attributes['start_date'];
    }

    public function getEndDate(): string
    {
        return $this->attributes['end_date'];
    }
}
