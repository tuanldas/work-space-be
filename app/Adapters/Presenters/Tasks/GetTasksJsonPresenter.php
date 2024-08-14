<?php

namespace App\Adapters\Presenters\Tasks;

use App\Adapters\Presenters\JsonPresenterHelpers;
use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Constants\TaskPreviewType;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Tasks\GetTasks\GetTasksOutputPort;
use App\Domain\UseCases\Tasks\GetTasks\GetTasksResponseModel;
use App\Http\Resources\Task\GetTasksCollection;
use App\Http\Resources\Task\GetTasksWithColumnPreviewCollection;

class GetTasksJsonPresenter implements GetTasksOutputPort
{
    use JsonPresenterHelpers;

    public function getTasks(GetTasksResponseModel $param): ViewModel
    {
        if ($param->getPreviewType() == TaskPreviewType::COLUMN) {
            return new JsonResourceViewModel(
                new GetTasksWithColumnPreviewCollection($param->getTasks())
            );
        }
        return new JsonResourceViewModel(
            new GetTasksCollection($param->getTasks())
        );
    }

    public function projectNotFound(): JsonResourceViewModel
    {
        return $this->notFound('Project not found');
    }
}
