<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this['uuid'],
            "title" => $this['title'],
            "start_time" => $this['start_time'],
            "end_time" => $this['end_time'],
        ];
    }
}
