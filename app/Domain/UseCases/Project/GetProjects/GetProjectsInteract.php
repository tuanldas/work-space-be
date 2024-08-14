<?php

namespace App\Domain\UseCases\Project\GetProjects;

use App\Filters\Project\ProjectsFilter;
use App\Repositories\Interface\ProjectRepositoryInterface;

class GetProjectsInteract implements GetProjectsInputPort
{
    public GetProjectsOutputPort $output;
    public ProjectRepositoryInterface $projectRepository;

    public function __construct(
        GetProjectsOutputPort      $output,
        ProjectRepositoryInterface $projectRepository
    )
    {
        $this->output = $output;
        $this->projectRepository = $projectRepository;
    }

    public function getProjects(GetProjectsRequest $request)
    {
        $projects = $this->projectRepository->getProjects(new ProjectsFilter([
            'userId' => $request->getUserId()
        ]));
        return $this->output->getProject(new GetProjectsResponseModel($projects));
    }
}
