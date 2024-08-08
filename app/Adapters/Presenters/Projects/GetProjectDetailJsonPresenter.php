<?php

namespace App\Adapters\Presenters\Projects;

use App\Adapters\Presenters\JsonPresenterHelpers;
use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Project\GetProjectDetail\GetProjectDetailOutputPort;
use App\Domain\UseCases\Project\GetProjectDetail\GetProjectDetailResponseModel;
use App\Http\Resources\GetProjectDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class GetProjectDetailJsonPresenter implements GetProjectDetailOutputPort
{
    use JsonPresenterHelpers;

    public function getProject(GetProjectDetailResponseModel $param): JsonResourceViewModel
    {
        return new JsonResourceViewModel(
            new GetProjectDetailResource($param->getProject())
        );
    }

    public function projectNotFound(): JsonResourceViewModel
    {
        return $this->notFound('Project not found');
    }
}
