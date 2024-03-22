<?php

namespace App\Domain\UseCases\Event\GetEvents;

use App\Domain\Interfaces\ViewModel;

interface GetEventsOutputPort
{
    public function getEvents(GetEventsResponseModel $model): ViewModel;
}
