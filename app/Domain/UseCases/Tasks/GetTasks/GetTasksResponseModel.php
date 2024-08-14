<?php

namespace App\Domain\UseCases\Tasks\GetTasks;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class GetTasksResponseModel
{
    public function __construct(
        private LengthAwarePaginator|Collection $tasks,
        private string                          $previewType
    )
    {
    }

    public function getTasks(): LengthAwarePaginator|Collection
    {
        return $this->tasks;
    }

    public function getPreviewType(): string
    {
        return $this->previewType;
    }
}
