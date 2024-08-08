<?php

namespace App\Domain\UseCases\Project\GetProjects;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class GetProjectsResponseModel
{
    public function __construct(
        private LengthAwarePaginator $projects
    )
    {
    }

    public function getProjects(): LengthAwarePaginator
    {
        return $this->projects;
    }
}
