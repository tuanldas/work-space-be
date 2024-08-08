<?php

namespace App\Http\Controllers\Api\Projects;

use App\Domain\UseCases\Tasks\GetTasks\GetTaskRequest;
use App\Domain\UseCases\Tasks\GetTasks\GetTasksInputPort;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GetProjectTasksController extends Controller
{
    private GetTasksInputPort $getTasksInputPort;

    public function __construct(GetTasksInputPort $getTasksInputPort)
    {
        $this->getTasksInputPort = $getTasksInputPort;
    }

    public function __invoke(Request $request, $projectUuid)
    {
        if (!Str::isUuid($projectUuid)) {
            return response()->json(['message' => 'Invalid project uuid'], 400);
        }
        $projects = $this->getTasksInputPort->handle(new GetTaskRequest(['project_uuid' => $projectUuid]));
        return $projects->getResource();
    }
}
