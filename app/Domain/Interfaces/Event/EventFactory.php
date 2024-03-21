<?php

namespace App\Domain\Interfaces\Event;

interface EventFactory
{
    public function make(array $attributes = []): EventEntity;
}
