<?php

namespace App\Domain\UseCases\Tasks\GetTasks;

use App\Constants\TaskPreviewType;

class GetTasksRequest
{
    /**
     * @param array{project_uuid: string|null, userId: int, preview_type: TaskPreviewType} $filters
     */
    public function __construct(
        private array $filters
    )
    {
        $this->filters['preview_type'] = $filters['preview_type'] ?? TaskPreviewType::COLUMN;
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

    public function getPreviewType()
    {
        return $this->filters['preview_type'];
    }
}
