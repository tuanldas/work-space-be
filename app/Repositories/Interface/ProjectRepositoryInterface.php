<?php

namespace App\Repositories\Interface;
interface ProjectRepositoryInterface extends RepositoryInterface
{
    public function getProjects();

    public function getProjectByUuid(string $getProjectUUid);
}
