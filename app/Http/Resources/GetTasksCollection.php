<?php

namespace App\Http\Resources;

use App\Http\Resources\Train\RemoveMetaAndLinksInCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GetTasksCollection extends ResourceCollection
{
    use RemoveMetaAndLinksInCollection;

    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($item) {
            return [
                'uuid' => $item->uuid,
                'title' => $item->title,
                'description' => $item->description,
                'project_uuid' => $item->project->uuid,
                'column_uuid' => $item->column->uuid,
            ];
        })->toArray();
    }

    public function with(Request $request)
    {
        return ['message' => 'Lấy danh sách tasks thành công'];
    }
}
