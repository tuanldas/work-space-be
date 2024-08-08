<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;

interface FiltersContract
{
    public function applyTo(Builder|EloquentBuilder $builder): void;
}
