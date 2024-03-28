<?php

namespace App\Providers;

use App\Adapters\Presenters\CreateEvent\CreateEventJsonPresenter;
use App\Adapters\Presenters\GetEevents\GetEventsJsonPresenter;
use App\Domain\Interfaces\Event\EventFactory;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Event\CreateEvent\CreateEventInputPorts;
use App\Domain\UseCases\Event\CreateEvent\CreateEventInteract;
use App\Domain\UseCases\Event\CreateEvent\CreateEventOutputPort;
use App\Domain\UseCases\Event\GetEvents\GetEventsInputPorts;
use App\Domain\UseCases\Event\GetEvents\GetEventsInteract;
use App\Domain\UseCases\Event\GetEvents\GetEventsOutputPort;
use App\Factories\EventModelFactory;
use App\Http\Controllers\Api\CalendarController;
use App\Repositories\CalendarRepository;
use App\Repositories\EloquentRepository;
use App\Repositories\EventRepository;
use App\Repositories\Interface\CalendarRepositoryInterface;
use App\Repositories\Interface\EventRepositoryInterface;
use App\Repositories\Interface\RepositoryInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->bindRepositories();
        $this->bindInputPorts();
        $this->app->bind(
            EventFactory::class,
            EventModelFactory::class
        );

        $this->app->bind(
            GetEventsOutputPort::class,
            GetEventsJsonPresenter::class
        );
        $this->app->bind(
            CreateEventOutputPort::class,
            CreateEventJsonPresenter::class
        );

        $this->app
            ->when(CalendarController::class)
            ->needs(CreateEventInputPorts::class)
            ->give(function ($app) {
                return $app->make(CreateEventInteract::class, [
                    'output' => $app->make(CreateEventJsonPresenter::class),
                ]);
            });


        $this->app->bind(
            GetEventsOutputPort::class,
            GetEventsJsonPresenter::class
        );
        $this->app->bind(
            GetEventsOutputPort::class,
            GetEventsCliPresenter::class
        );
        $this->app->bind(
            GetEventsOutputPort::class,
            GetEventsHttpPresenter::class
        );

        $this->app
            ->when(CalendarController::class)
            ->needs(GetEventsInputPorts::class)
            ->give(function (Application $app) {
                return $app->make(GetEventsInteract::class, [
                    'output' => $app->make(GetEventsJsonPresenter::class),
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
            CalendarRepositoryInterface::class,
            CalendarRepository::class
        );
        $this->app->bind(
            EventRepositoryInterface::class,
            EventRepository::class
        );
    }

    private function bindInputPorts(): void
    {
        $this->app->bind(
            GetEventsInputPorts::class,
            GetEventsInteract::class
        );
        $this->app->bind(
            CreateEventInputPorts::class,
            CreateEventInteract::class
        );
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
