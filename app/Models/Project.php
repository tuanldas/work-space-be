<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'projects';

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, ProjectMember::class, 'project_id', 'user_id');
    }

    public function columns(): HasMany
    {
        return $this->hasMany(Column::class);
    }
}
