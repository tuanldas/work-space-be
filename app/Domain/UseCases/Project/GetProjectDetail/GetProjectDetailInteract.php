<?php

namespace App\Domain\UseCases\Project\GetProjectDetail;

use App\Filters\Project\ProjectDetailFilter;
use App\Repositories\Interface\ProjectRepositoryInterface;

class GetProjectDetailInteract implements GetProjectDetailInputPort
{
    public function __construct(
        private GetProjectDetailOutputPort $output,
        private ProjectRepositoryInterface $projectRepository
    )
    {
    }

    public function handle($uuid, $userId)
    {
        $project = $this->projectRepository->filters(new ProjectDetailFilter([
            'userId' => $userId,
            'projectUUid' => $uuid
        ]), ['*'], ['users.userProfile']);
        if (!$project) {
            return $this->output->projectNotFound();
        }
        return $this->output->getProject(new GetProjectDetailResponseModel($project));
    }
}
