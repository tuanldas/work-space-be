<?php

namespace App\Domain\UseCases\Project\GetProjectDetail;
interface GetProjectDetailOutputPort
{
    public function getProject(GetProjectDetailResponseModel $param);

    public function projectNotFound();
}
