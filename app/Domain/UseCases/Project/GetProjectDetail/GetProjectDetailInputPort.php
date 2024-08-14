<?php

namespace App\Domain\UseCases\Project\GetProjectDetail;
interface GetProjectDetailInputPort
{
    public function handle($uuid, $userId);
}
