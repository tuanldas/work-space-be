<?php

namespace App\Repositories;

use App\Filters\TaskFilter;
use App\Models\Task;
use App\Repositories\Interface\TaskRepositoryInterface;

class TaskRepository extends EloquentRepository implements TaskRepositoryInterface
{
    public function getModel(): string
    {
        return Task::class;
    }

    public function getTasks(TaskFilter $filters)
    {
        $query = $this->model->select(['*']);
        $filters->applyTo($query);
        return $query->paginate(15);
    }
}
