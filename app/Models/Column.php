<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\LengthAwarePaginator;

class Column extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'columns';

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function taskPaginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->tasks()->paginate($perPage);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
