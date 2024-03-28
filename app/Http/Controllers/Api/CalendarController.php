<?php

namespace App\Http\Controllers\Api;

use App\Domain\UseCases\Event\CreateEvent\CreateEventInputPorts;
use App\Domain\UseCases\Event\CreateEvent\CreateEventRequestModel;
use App\Domain\UseCases\Event\GetEvents\GetEventsInputPorts;
use App\Domain\UseCases\Event\GetEvents\GetEventsRequestModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Calendar\GetEventsRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function __construct(
        private readonly GetEventsInputPorts   $getEventsInputPorts,
        private readonly CreateEventInputPorts $createEventInputPorts,
    )
    {
    }

    public function getEvents(GetEventsRequest $request): JsonResource
    {
        $viewModel = $this->getEventsInputPorts->getEvents(new GetEventsRequestModel($request->validated()));
        return $viewModel->getResource();
    }

    public function createEvent(GetEventsRequest $request): JsonResource
    {
        $attributes = $request->validated();
        $attributes['event_person'] = Auth::id();
        $viewModel = $this->createEventInputPorts->createEvent(
            new CreateEventRequestModel($attributes)
        );
        return $viewModel->getResource();
    }
}
