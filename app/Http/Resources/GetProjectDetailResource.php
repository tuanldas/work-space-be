<?php

namespace App\Http\Resources;

use App\Constants\ProjectStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class GetProjectDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'desc' => $this->desc,
            'icon' => Storage::url($this->icon),
            'due_date' => $this->due_date,
            'status' => [
                'name' => ProjectStatusEnum::getStatusName($this->status),
                'value' => $this->status,
            ],
            'users' => $this->users->map(function ($user) {
                return [
                    'uuid' => $user->uuid,
                    'name' => $user->name,
                    'avatar' => $user->userProfile ? Storage::url($user->userProfile->avatar) : '',
                ];
            }),
        ];
    }
}
