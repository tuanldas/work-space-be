<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Event\GetEvents\GetEventsInputPorts;
use App\Http\Requests\Calendar\GetEventRequest;
use Illuminate\Http\JsonResponse;

class CalendarController extends Controller
{
    public function __construct(
        private GetEventsInputPorts $getEventsInputPorts
    )
    {
    }

    public function getEvents(GetEventRequest $request): JsonResponse
    {
        $this->getEventsInputPorts->getEvents($request->toRequestModel());
    }
}
