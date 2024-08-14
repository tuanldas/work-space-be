<?php

namespace App\Domain\UseCases\Tasks\GetTasks;
interface GetTasksInputPort
{
    public function handle(GetTasksRequest $getTaskRequest);
}
