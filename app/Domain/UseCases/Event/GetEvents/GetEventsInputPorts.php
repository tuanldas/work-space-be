<?php

namespace App\Domain\UseCases\Event\GetEvents;
interface GetEventsInputPorts
{
    public function getEvents(GetEventsRequestModel $model): GetEventsResponseModel;
}
