<?php

namespace App\Domain\UseCases\Tasks\GetTasks;

use App\Filters\TaskFilter;
use App\Repositories\Interface\ProjectRepositoryInterface;
use App\Repositories\Interface\TaskRepositoryInterface;

class GetTasksInteract implements GetTasksInputPort
{
    private GetTasksOutputPort $output;
    private ProjectRepositoryInterface $projectRepository;
    private TaskRepositoryInterface $taskRepository;

    public function __construct(
        $output,
        ProjectRepositoryInterface $projectRepository,
        TaskRepositoryInterface $taskRepository
    )
    {
        $this->output = $output;
        $this->projectRepository = $projectRepository;
        $this->taskRepository = $taskRepository;
    }

    public function handle(GetTaskRequest $getTaskRequest)
    {
        $filters = new TaskFilter();
        if ($getTaskRequest->getProjectUUid()) {
            $project = $this->projectRepository->getProjectByUuid($getTaskRequest->getProjectUUid());
            if (!$project) {
                return $this->output->projectNotFound();
            }
            $filters->setProjectId($project->id);
        }
        $tasks = $this->taskRepository->getTasks($filters);
        return $this->output->getTasks(new GetTasksResponseModel($tasks));
    }
}
