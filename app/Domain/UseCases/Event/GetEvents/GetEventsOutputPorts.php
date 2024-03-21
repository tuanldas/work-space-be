<?php

namespace App\Domain\UseCases\Event\GetEvents;
interface GetEventsOutputPorts
{
    public function getEvents(GetEventsRequestModel $model): GetEventsResponseModel;
}
