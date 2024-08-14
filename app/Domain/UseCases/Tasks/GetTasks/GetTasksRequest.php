<?php

namespace App\Domain\UseCases\Tasks\GetTasks;
readonly class GetTasksRequest
{
    /**
     * @param array{project_uuid: string|null, userId: int} $filters
     */
    public function __construct(
        private array $filters
    )
    {
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getProjectUUid()
    {
        return $this->filters['project_uuid'] ?? null;
    }

    public function getUserId()
    {
        return $this->filters['userId'];
    }
}
