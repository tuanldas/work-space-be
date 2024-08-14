<?php

namespace App\Http\Controllers\Api\Projects;

use App\Domain\UseCases\Project\GetProjectDetail\GetProjectDetailInputPort;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GetProjectDetailController extends Controller
{
    public function __construct(
        protected GetProjectDetailInputPort $inputPort
    )
    {
    }

    public function __invoke($uuid)
    {
        $jsonResource = $this->inputPort->handle($uuid, Auth::id());
        return $jsonResource->getResource()
            ->response()
            ->setStatusCode($jsonResource->getStatusCode());
    }
}
