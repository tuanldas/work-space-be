<?php

namespace App\Adapters\Presenters\CreateEvent;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Event\CreateEvent\CreateEventOutputPort;
use App\Http\Resources\CreateEvent\UnableToCreateEventResource;

class CreateEventJsonPresenter implements CreateEventOutputPort
{
    /**
     * @throws \Throwable
     */
    public function unableToCreateEvent(\Throwable $e): ViewModel
    {
        if (config('app.debug')) {
            throw $e;
        }
        return new JsonResourceViewModel(
            new UnableToCreateEventResource($e)
        );
    }
}
