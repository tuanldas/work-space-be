<?php

namespace App\Domain\UseCases\Tasks\GetTasks;

use App\Filters\Project\ProjectDetailFilter;
use App\Filters\TasksFilter;
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

    public function handle(GetTasksRequest $getTaskRequest)
    {
        $filters = new TasksFilter();
        if ($getTaskRequest->getProjectUUid()) {
            $project = $this->projectRepository->filters(new ProjectDetailFilter([
                'userId' => $getTaskRequest->getUserId(),
                'projectUUid' => $getTaskRequest->getProjectUUid()
            ]));
            if (!$project) {
                return $this->output->projectNotFound();
            }
            $filters->setProjectId($project->id);
        }
        $tasks = $this->taskRepository->getTasks($filters);
        return $this->output->getTasks(new GetTasksResponseModel($tasks));
    }
}
