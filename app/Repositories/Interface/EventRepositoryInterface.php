<?php

namespace App\Repositories\Interface;
interface EventRepositoryInterface extends RepositoryInterface
{
    public function getEventsByDate(string $getStartDate, string $getEndDate);
}
