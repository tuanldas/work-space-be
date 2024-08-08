<?php

namespace App\Repositories\Interface;

use App\Filters\TaskFilter;

interface TaskRepositoryInterface extends RepositoryInterface
{
    public function getTasks(TaskFilter $filters);
}
