<?php

namespace App\Repositories\Interface;
interface EventRepositoryInterface extends RepositoryInterface
{
    public function getEventsByDate(int $userId, string $getStartDate, string $getEndDate);
}
