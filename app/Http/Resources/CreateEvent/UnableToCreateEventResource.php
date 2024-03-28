<?php

namespace App\Http\Resources\CreateEvent;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnableToCreateEventResource extends JsonResource
{
    protected \Throwable $e;

    public function __construct($resource)
    {
        $this->e = $resource;
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'message' => $this->e->getMessage()
        ];
    }
}
