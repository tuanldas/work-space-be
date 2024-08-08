<?php

namespace App\Providers;

use App\Adapters\Presenters\Projects\GetProjectDetailJsonPresenter;
use App\Adapters\Presenters\Projects\GetProjectsJsonPresenter;
use App\Adapters\Presenters\Tasks\GetTasksJsonPresenter;
use App\Domain\UseCases\Project\GetProjectDetail\GetProjectDetailInputPort;
use App\Domain\UseCases\Project\GetProjectDetail\GetProjectDetailInteract;
use App\Domain\UseCases\Project\GetProjects\GetProjectsInputPort;
use App\Domain\UseCases\Project\GetProjects\GetProjectsInteract;
use App\Domain\UseCases\Tasks\GetTasks\GetTasksInputPort;
use App\Domain\UseCases\Tasks\GetTasks\GetTasksInteract;
use App\Http\Controllers\Api\Projects\GetProjectController;
use App\Http\Controllers\Api\Projects\GetProjectDetailController;
use App\Http\Controllers\Api\Projects\GetProjectTasksController;
use App\Repositories\EloquentRepository;
use App\Repositories\Interface\ProjectMemberRepositoryInterface;
use App\Repositories\Interface\ProjectRepositoryInterface;
use App\Repositories\Interface\RepositoryInterface;
use App\Repositories\Interface\TaskRepositoryInterface;
use App\Repositories\Interface\UserProfileRepositoryInterface;
use App\Repositories\ProjectMemberRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserProfileRepository;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->bindRepositories();
        $this->app
            ->when(GetProjectController::class)
            ->needs(GetProjectsInputPort::class)
            ->give(function ($app) {
                return $app->make(GetProjectsInteract::class, [
                    'output' => $app->make(GetProjectsJsonPresenter::class),
                ]);
            });
        $this->app
            ->when(GetProjectDetailController::class)
            ->needs(GetProjectDetailInputPort::class)
            ->give(function ($app) {
                return $app->make(GetProjectDetailInteract::class, [
                    'output' => $app->make(GetProjectDetailJsonPresenter::class),
                ]);
            });
        $this->app
            ->when(GetProjectTasksController::class)
            ->needs(GetTasksInputPort::class)
            ->give(function ($app) {
                return $app->make(GetTasksInteract::class, [
                    'output' => $app->make(GetTasksJsonPresenter::class),
                ]);
            });
    }

    private function bindRepositories(): void
    {
        $this->app->bind(
            RepositoryInterface::class,
            EloquentRepository::class
        );
        $this->app->bind(
            UserProfileRepositoryInterface::class,
            UserProfileRepository::class
        );
        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );
        $this->app->bind(
            ProjectMemberRepositoryInterface::class,
            ProjectMemberRepository::class
        );
        $this->app->bind(
            TaskRepositoryInterface::class,
            TaskRepository::class
        );
    }

    public function boot(): void
    {
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        Passport::enablePasswordGrant();
    }
}
