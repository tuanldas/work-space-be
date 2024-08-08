<?php

namespace App\Domain\UseCases\Tasks\GetTasks;

use Illuminate\Pagination\LengthAwarePaginator;

readonly class GetTasksResponseModel
{
    public function __construct(
        private LengthAwarePaginator $tasks
    )
    {
    }

    public function getTasks(): LengthAwarePaginator
    {
        return $this->tasks;
    }
}
