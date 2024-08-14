<?php

namespace App\Repositories\Interface;

use App\Filters\TasksFilter;

interface TaskRepositoryInterface extends RepositoryInterface
{
    public function getTasks(TasksFilter $filters);
}
