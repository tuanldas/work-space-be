<?php

namespace App\Repositories;

use App\Models\ProjectMember;
use App\Repositories\Interface\ProjectMemberRepositoryInterface;

class ProjectMemberRepository extends EloquentRepository implements ProjectMemberRepositoryInterface
{
    public function getModel(): string
    {
        return ProjectMember::class;
    }
}
