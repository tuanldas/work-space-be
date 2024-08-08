<?php

namespace App\Adapters\Presenters\Projects;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Project\GetProjects\GetProjectsOutputPort;
use App\Domain\UseCases\Project\GetProjects\GetProjectsResponseModel;
use App\Http\Resources\GetProjectCollection;

class GetProjectsJsonPresenter implements GetProjectsOutputPort
{
    public function getProject(GetProjectsResponseModel $param): ViewModel
    {
        return new JsonResourceViewModel(
            new GetProjectCollection($param->getProjects())
        );
    }
}
