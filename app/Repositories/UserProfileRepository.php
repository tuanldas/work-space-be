<?php

namespace App\Repositories;

use App\Models\UserProfile;
use App\Repositories\Interface\UserProfileRepositoryInterface;

class UserProfileRepository extends EloquentRepository implements UserProfileRepositoryInterface
{
    public function getModel(): string
    {
        return UserProfile::class;
    }
}
