<?php

namespace App\Adapters\Presenters\Tasks;

use App\Adapters\Presenters\JsonPresenterHelpers;
use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Tasks\GetTasks\GetTasksOutputPort;
use App\Domain\UseCases\Tasks\GetTasks\GetTasksResponseModel;
use App\Http\Resources\GetTasksCollection;

class GetTasksJsonPresenter implements GetTasksOutputPort
{
    use JsonPresenterHelpers;

    public function getTasks(GetTasksResponseModel $param): ViewModel
    {
        return new JsonResourceViewModel(
            new GetTasksCollection($param->getTasks())
        );
    }

    public function projectNotFound()
    {
        return $this->notFound('Project not found');
    }
}
