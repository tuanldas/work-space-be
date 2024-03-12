<?php

namespace App\Http\Controllers;

use App\Http\Requests\Calendar\GetEventRequest;
use Illuminate\Http\JsonResponse;

class CalendarController extends Controller
{
    public function getEvents(GetEventRequest $request): JsonResponse
    {
        $events = [
            [
                'title' => 'Event 1',
                'start' => '2020-07-01',
                'end' => '2020-07-02',
                'url' => 'http://www.example.com'
            ],
            [
                'title' => 'Event 2',
                'start' => '2020-07-05',
                'end' => '2020-07-07',
                'url' => 'http://www.example.com'
            ],
            [
                'title' => 'Event 3',
                'start' => '2020-07-09',
                'end' => '2020-07-10',
                'url' => 'http://www.example.com'
            ]
        ];
        return response()->json($events);
    }
}
