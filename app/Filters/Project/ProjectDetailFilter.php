<?php

namespace App\Filters\Project;

use App\Filters\FiltersContract;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class ProjectDetailFilter implements FiltersContract
{
    private Collection $filters;
    private Builder|EloquentBuilder $builder;

    /**
     * @param array{userId: int|null, projectUUid: string|null} $filters
     */
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

    private function projectUUid(string|null $uuid): void
    {
        $this->builder->when($uuid !== null, function ($query) use ($uuid) {
            $query->where('uuid', $uuid);
        });
    }
}
