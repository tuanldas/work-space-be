<?php

namespace App\Repositories;

use App\Models\CalendarModel;
use App\Repositories\Interface\CalendarRepositoryInterface;

class CalendarRepository extends EloquentRepository implements CalendarRepositoryInterface
{
    public function getModel(): string
    {
        return CalendarModel::class;
    }

    public function findByUserId(int $userId)
    {
        return $this->model->where('owner', $userId)->first();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }
}
