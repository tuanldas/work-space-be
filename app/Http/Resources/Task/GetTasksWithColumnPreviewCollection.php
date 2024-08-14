<?php

namespace App\Http\Resources\Task;

use App\Http\Resources\Train\RemoveMetaAndLinksInCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GetTasksWithColumnPreviewCollection extends ResourceCollection
{
    use RemoveMetaAndLinksInCollection;

    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($item) {
            return [
                'uuid' => $item->uuid,
                'title' => $item->title,
                'position' => $item->position,
                'project_uuid' => $item->project->uuid,
                'tasks' => [
                    'current_page' => $item->tasks->currentPage(),
                    'total' => $item->tasks->total(),
                    'last_page' => $item->tasks->lastPage(),
                    'items' => $item->tasks->map(function ($task) {
                        return [
                            'uuid' => $task->uuid,
                            'title' => $task->title,
                            'description' => $task->description,
                            'project_uuid' => $task->project->uuid,
                            'column_uuid' => $task->column->uuid,
                        ];
                    })->toArray()
                ]
            ];
        })->toArray();
    }

    public function with(Request $request): array
    {
        return ['message' => 'Lấy danh sách tasks thành công'];
    }
}
