<?php

namespace App\Http\Controllers\Api\Projects;

use App\Domain\UseCases\Project\GetProjects\GetProjectsInputPort;
use App\Http\Controllers\Controller;

class GetProjectController extends Controller
{
    public GetProjectsInputPort $getProjectsInputPorts;

    public function __construct(
        GetProjectsInputPort $getProjectsInputPorts
    )
    {
        $this->getProjectsInputPorts = $getProjectsInputPorts;
    }

    public function __invoke()
    {
        $projects = $this->getProjectsInputPorts->getProjects();
        return $projects->getResource();
    }
}
