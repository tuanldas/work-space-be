<?php

namespace App\Repositories\Interface;
interface EventRepositoryInterface extends RepositoryInterface
{
    function getEventsByDate(int $userId, string $getStartDate, string $getEndDate);
}
