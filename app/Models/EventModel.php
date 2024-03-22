<?php

namespace App\Models;

use App\Domain\Interfaces\Event\EventEntity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model implements EventEntity
{
    use HasFactory;

    protected $table = 'events';

    public function getId()
    {
        return $this->getId();
    }

    public function getUUid()
    {
        return $this->getUUid();
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setStartTime(Carbon $startTime): void
    {
        $this->attributes['start_time'] = $startTime->utc();
    }

    public function getStartTime()
    {
        return $this->attributes['start_time'];
    }

    public function setEndTime(Carbon $endTime): void
    {
        $this->attributes['end_time'] = $endTime->utc();
    }

    public function getEndTime()
    {
        return $this->attributes['end_time'];
    }

    public function setNote(string $note): void
    {
        $this->attributes['note'] = $note;
    }

    public function getNote()
    {
        return $this->attributes['note'];
    }

    public function setEventPerson(int $userId): void
    {
        $this->attributes['event_person'] = $userId;
    }

    public function getEventPerson()
    {
        return $this->attributes['event_person'];
    }
}
