<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class TaskFilter implements FiltersContract
{
    private Collection $filters;
    private Builder|EloquentBuilder $builder;

    public function __construct(array $filters = [])
    {
        $this->filters = collect($filters)->filter();
    }

    public function applyTo(Builder|EloquentBuilder $builder): void
    {
        $this->builder = $builder;
        $this->filters->each(function ($value, $filter) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        });
    }

    public function setProjectId($id): void
    {
        $this->filters->put('projectId', $id);
    }

    private function projectId(int $projectId): void
    {
        $this->builder->where('project_id', $projectId);
    }
}
