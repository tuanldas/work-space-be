<?php

namespace App\Domain\UseCases\Event\GetEvents;

use App\Domain\Interfaces\ViewModel;

interface GetEventsInputPorts
{
    public function getEvents(GetEventsRequestModel $model): ViewModel;
}
