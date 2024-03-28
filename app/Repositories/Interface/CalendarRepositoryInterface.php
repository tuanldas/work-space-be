<?php

namespace App\Repositories\Interface;

interface CalendarRepositoryInterface
{
    public function findByUserId(int $userId);

    public function findById(int $id);
}
