<?php

namespace App\Domain\UseCases\Tasks\GetTasks;

use App\Constants\TaskPreviewType;
use App\Filters\Project\ProjectDetailFilter;
use App\Filters\TasksFilter;
use App\Repositories\Interface\ProjectRepositoryInterface;
use App\Repositories\Interface\TaskRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GetTasksInteract implements GetTasksInputPort
{
    private GetTasksOutputPort $output;
    private ProjectRepositoryInterface $projectRepository;
    private TaskRepositoryInterface $taskRepository;

    public function __construct(
        $output,
        ProjectRepositoryInterface $projectRepository,
        TaskRepositoryInterface $taskRepository,
    )
    {
        $this->output = $output;
        $this->projectRepository = $projectRepository;
        $this->taskRepository = $taskRepository;
    }

    public function handle(GetTasksRequest $getTaskRequest)
    {
        $filters = new TasksFilter();
        $tasks = new LengthAwarePaginator([], 0, 10);
        if ($getTaskRequest->getProjectUUid()) {
            $project = $this->projectRepository->filters(new ProjectDetailFilter([
                'userId' => $getTaskRequest->getUserId(),
                'projectUUid' => $getTaskRequest->getProjectUUid()
            ]), ['*'], ['columns']);
            if (!$project) {
                return $this->output->projectNotFound();
            }
            $filters->setProjectId($project->id);
            if ($getTaskRequest->getPreviewType() == TaskPreviewType::COLUMN) {
                $tasks = $this->getTasksWithColumnType($project);
            } else {
                $tasks = $this->taskRepository->getTasks($filters);
            }
        }
        return $this->output->getTasks(new GetTasksResponseModel($tasks, $getTaskRequest->getPreviewType()));
    }

    private function getTasksWithColumnType($project)
    {
        $columns = $project->columns;
        $columns->map(function ($column) {
            $column->tasks = $column->taskPaginate();
        });
        return $columns;
    }
}
