<?php

namespace App\Repositories\Interface;

use App\Filters\Project\ProjectsFilter;

interface ProjectRepositoryInterface extends RepositoryInterface
{
    public function getProjects(ProjectsFilter $filters);
}
