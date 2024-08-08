<?php

namespace App\Domain\UseCases\Project\GetProjects;

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

    public function getProjects()
    {
        $projects = $this->projectRepository->getProjects();
        return $this->output->getProject(new GetProjectsResponseModel($projects));
    }
}
