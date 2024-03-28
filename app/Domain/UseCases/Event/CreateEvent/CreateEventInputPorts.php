<?php

namespace App\Domain\UseCases\Event\CreateEvent;

use App\Domain\Interfaces\ViewModel;

interface CreateEventInputPorts
{
    public function createEvent(CreateEventRequestModel $model);
}
