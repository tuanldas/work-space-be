<?php

namespace App\Providers;

use App\Adapters\Presenters\GetEevents\GetEventsJsonPresenter;
use App\Domain\UseCases\Event\GetEvents\GetEventsInputPorts;
use App\Domain\UseCases\Event\GetEvents\GetEventsInteract;
use App\Http\Controllers\Api\CalendarController;
use App\Repositories\EloquentRepository;
use App\Repositories\EventRepository;
use App\Repositories\Interface\EventRepositoryInterface;
use App\Repositories\Interface\RepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            RepositoryInterface::class,
            EloquentRepository::class
        );
        $this->app->bind(
            EventRepositoryInterface::class,
            EventRepository::class
        );
        $this->app->bind(
            GetEventsInputPorts::class,
            GetEventsInteract::class
        );
        $this->app
            ->when(CalendarController::class)
            ->needs(GetEventsInputPorts::class)
            ->give(function ($app) {
                return $app->make(GetEventsInteract::class, [
                    'output' => $app->make(GetEventsJsonPresenter::class),
                ]);
            });
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
