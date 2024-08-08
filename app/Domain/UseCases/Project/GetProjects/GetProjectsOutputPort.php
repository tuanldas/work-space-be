<?php

namespace App\Domain\UseCases\Project\GetProjects;
interface GetProjectsOutputPort
{
    public function getProject(GetProjectsResponseModel $param);
}
