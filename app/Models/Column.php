<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
