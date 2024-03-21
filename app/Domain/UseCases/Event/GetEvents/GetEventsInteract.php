<?php

namespace App\Domain\UseCases\Event\GetEvents;

use App\Domain\Interfaces\Event\EventFactory;
use App\Repositories\Interface\EventRepositoryInterface;

class GetEventsInteract implements GetEventsInputPorts
{
    public function __construct(
        private GetEventsOutputPorts     $output,
        private EventRepositoryInterface $repository,
        private EventFactory             $factory
    )
    {
    }

    public function getEvents(GetEventsRequestModel $model): GetEventsResponseModel
    {
        $events = $this->repository->getEvents($model->getStartDate(), $model->getEndDate());
    }
}
