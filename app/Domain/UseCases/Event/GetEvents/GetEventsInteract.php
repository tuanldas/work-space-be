<?php

namespace App\Domain\UseCases\Event\GetEvents;

use App\Domain\Interfaces\ViewModel;
use App\Repositories\Interface\EventRepositoryInterface;

class GetEventsInteract implements GetEventsInputPorts
{
    public function __construct(
        private GetEventsOutputPort      $output,
        private EventRepositoryInterface $repository,
    )
    {
    }

    public function getEvents(GetEventsRequestModel $model): ViewModel
    {
        $events = $this->repository->getEventsByDate($model->getStartDate(), $model->getEndDate());
        return $this->output->getEvents(new GetEventsResponseModel($events->toArray()));
    }
}
