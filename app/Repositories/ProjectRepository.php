<?php

namespace App\Repositories;

use App\Filters\Project\ProjectsFilter;
use App\Models\Project;
use App\Repositories\Interface\ProjectRepositoryInterface;

class ProjectRepository extends EloquentRepository implements ProjectRepositoryInterface
{
    public function getModel(): string
    {
        return Project::class;
    }

    public function getProjects(ProjectsFilter $filters)
    {
        $query = $this->model
            ->with('users.userProfile')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc');
        $filters->applyTo($query);
        return $query->paginate(15);
    }
}
