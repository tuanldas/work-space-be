<?php

namespace App\Domain\Interfaces\Event;

use Carbon\Carbon;

interface EventEntity
{
    public function getId();

    public function getUUid();

    public function setTitle(string $title);

    public function getTitle(): string;

    public function setStartTime(Carbon $startTime);

    public function getStartTime();

    public function setEndTime(Carbon $endTime);

    public function getEndTime();

    public function setNote(string $note);

    public function getNote();

    public function setEventPerson(int $userId);

    public function getEventPerson();
}
