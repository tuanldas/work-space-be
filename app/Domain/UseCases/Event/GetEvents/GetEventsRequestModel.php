<?php

namespace App\Domain\UseCases\Event\GetEvents;
class GetEventsRequestModel
{
    public function __construct(
        private string $startDate,
        private string $endDate
    ) {
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }
}
