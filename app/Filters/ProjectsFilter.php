<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class ProjectsFilter implements FiltersContract
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

    private function userId(int|null $userId): void
    {
        $this->builder->when($userId !== null, function ($query) use ($userId) {
            $query->whereHas('projectMember', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            });
        });
    }
}
