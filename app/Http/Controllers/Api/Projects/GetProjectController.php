<?php

namespace App\Http\Controllers\Api\Projects;

use App\Domain\UseCases\Project\GetProjects\GetProjectsInputPort;
use App\Domain\UseCases\Project\GetProjects\GetProjectsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $projects = $this->getProjectsInputPorts->getProjects(new GetProjectsRequest([
            'user_id' => Auth::id()
        ]));
        return $projects->getResource();
    }
}
