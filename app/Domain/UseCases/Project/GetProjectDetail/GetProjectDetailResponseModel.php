<?php

namespace App\Domain\UseCases\Project\GetProjectDetail;

use App\Models\Project;

readonly class GetProjectDetailResponseModel
{
    public function __construct(
        private Project $project
    )
    {
    }

    public function getProject(): Project
    {
        return $this->project;
    }
}
