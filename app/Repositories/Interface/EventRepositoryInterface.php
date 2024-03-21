<?php

namespace App\Repositories\Interface;
interface EventRepositoryInterface
{
    public function getEvents(string $getStartDate, string $getEndDate);
}
