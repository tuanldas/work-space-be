<?php

namespace App\Domain\UseCases\Tasks\GetTasks;
interface GetTasksOutputPort
{
    public function getTasks(GetTasksResponseModel $param);

    public function projectNotFound();
}
