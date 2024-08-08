<?php

namespace Database\Seeders;

use App\Models\Column;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'admin@tuanldas.me')->first();
        if ($user) {
            $project = $user->projects->last();
            if ($project) {
                if ($project->columns->count() === 0) {
                    Column::factory()
                        ->count(3)
                        ->create([
                            'project_id' => $project->id
                        ]);
                }
                $column = Column::where('project_id', $project->id)->first();
                if ($column) {
                    Task::factory()
                        ->count(50)
                        ->create([
                            'project_id' => $project->id,
                            'column_id' => $column->id
                        ]);
                }
            }
        }
    }
}
