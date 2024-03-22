<?php

namespace App\Http\Controllers\Api;

use App\Domain\UseCases\Event\GetEvents\GetEventsInputPorts;
use App\Domain\UseCases\Event\GetEvents\GetEventsRequestModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Calendar\GetEventRequest;

class CalendarController extends Controller
{
    public function __construct(
        private GetEventsInputPorts $getEventsInputPorts
    )
    {
    }

    public function getEvents(GetEventRequest $request): \Illuminate\Http\Resources\Json\JsonResource
    {
        $viewModel = $this->getEventsInputPorts->getEvents(new GetEventsRequestModel($request->validated()));
        return $viewModel->getResource();
    }
}
