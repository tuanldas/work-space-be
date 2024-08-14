<?php

namespace App\Domain\UseCases\Project\GetProjects;
readonly class GetProjectsRequest
{
    public function __construct(
        private array $filters
    )
    {
    }

    public function getUserId()
    {
        return $this->filters['user_id'] ?? null;
    }
}
