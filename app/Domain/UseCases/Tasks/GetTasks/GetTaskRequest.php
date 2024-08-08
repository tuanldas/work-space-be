<?php

namespace App\Domain\UseCases\Tasks\GetTasks;
readonly class GetTaskRequest
{
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
}
