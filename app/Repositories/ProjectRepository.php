<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Interface\ProjectRepositoryInterface;

class ProjectRepository extends EloquentRepository implements ProjectRepositoryInterface
{
    public function getModel(): string
    {
        return Project::class;
    }

    public function getProjects()
    {
        return $this->model
            ->with('users.userProfile')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(15);
    }

    public function getProjectByUuid(string $getProjectUUid)
    {
        return $this->model->where('uuid', $getProjectUUid)->first();
    }
}
