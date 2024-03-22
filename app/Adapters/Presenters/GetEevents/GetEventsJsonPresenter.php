<?php

namespace App\Adapters\Presenters\GetEevents;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Event\GetEvents\GetEventsOutputPort;
use App\Domain\UseCases\Event\GetEvents\GetEventsResponseModel;
use App\Http\Resources\EventCollection;

class GetEventsJsonPresenter implements GetEventsOutputPort
{
    public function getEvents(GetEventsResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            EventCollection::collection($model->getEvents())
                ->additional(['message' => 'Lấy danh sách events thành công'])
        );
    }
}
