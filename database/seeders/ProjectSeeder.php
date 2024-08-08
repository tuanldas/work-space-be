<?php

namespace Database\Seeders;

use App\Helpers\ImageRenderHelper;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'admin@tuanldas.me')->first();
        if ($user) {
            $image = new ImageRenderHelper('The asdf');
            $image->toImage();
            Project::factory([
                'icon' => $image->getFilePath()
            ])
                ->count(1000)
                ->create()
                ->each(function ($project) use ($user) {
                    $project->users()->attach($user, ['uuid' => Str::uuid(), 'is_owner' => true]);
                });
        }
    }
}
