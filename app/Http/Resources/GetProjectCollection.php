<?php

namespace App\Http\Resources;

use App\Constants\ProjectStatusEnum;
use App\Http\Resources\Train\RemoveMetaAndLinksInCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;

class GetProjectCollection extends ResourceCollection
{
    use RemoveMetaAndLinksInCollection;

    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($project) {
            return [
                'uuid' => $project->uuid,
                'name' => $project->name,
                'desc' => $project->desc,
                'icon' => Storage::url($project->icon),
                'due_date' => $project->due_date,
                'status' => [
                    'name' => ProjectStatusEnum::getStatusName($project->status),
                    'value' => $project->status,
                ],
                'users' => $project->users->map(function ($user) {
                    return [
                        'uuid' => $user->uuid,
                        'name' => $user->name,
                        'avatar' => $user->userProfile ? Storage::url($user->userProfile->avatar) : '',
                    ];
                }),
            ];
        })->toArray();
    }

    public function with(Request $request)
    {
        return ['message' => 'Lấy danh sách project thành công'];
    }
}
