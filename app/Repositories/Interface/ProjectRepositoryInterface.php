<?php

namespace App\Repositories\Interface;

use App\Filters\ProjectsFilter;

interface ProjectRepositoryInterface extends RepositoryInterface
{
    public function getProjects(ProjectsFilter $filters);

    public function getProjectByUuid(string $getProjectUUid);
}
