<?php

namespace App\Domain\UseCases\Event\CreateEvent;

use App\Domain\Interfaces\Event\EventFactory;
use App\Repositories\Interface\CalendarRepositoryInterface;
use App\Repositories\Interface\EventRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CreateEventInteract implements CreateEventInputPorts
{
    public function __construct(
        private CreateEventOutputPort       $outputPort,
        private EventRepositoryInterface    $repository,
        private CalendarRepositoryInterface $calendarRepository,
        private EventFactory                $factory,
    )
    {
    }

    public function createEvent(CreateEventRequestModel $model)
    {
        $event = $this->factory->make([
            'title' => $model->getTitle(),
            'start_time' => Carbon::parse($model->getStartTime()),
            'end_time' => Carbon::parse($model->getEndTime()),
            'calendar_id' => $model->getCalendarId(),
            'event_person' => $model->getEventPerson()
        ]);
        try {
            $calendar = $this->calendarRepository->findById($event->getCalendarId());
            if (!$calendar) {
                throw new NotFoundHttpException();
            }
            $calendar = $this->calendarRepository->findByUserId($event->getEventPerson());
            if (!$calendar) {
                throw new UnauthorizedException();
            }
            $event->setCalendarId($calendar->id);
            $this->repository->save($event);
        } catch (\Exception $e) {
            $this->outputPort->unableToCreateEvent($e);
        }
    }
}
