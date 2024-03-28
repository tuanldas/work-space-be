<?php

namespace App\Domain\UseCases\Event\CreateEvent;

use App\Domain\Interfaces\ViewModel;

interface CreateEventOutputPort
{
    public function unableToCreateEvent(\Throwable $e): ViewModel;
}
