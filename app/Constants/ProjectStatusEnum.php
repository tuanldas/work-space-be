<?php

namespace App\Constants;
enum ProjectStatusEnum
{
    const IN_PROGRESS = 1;
    const COMPLETED = 2;
    const CANCELLED = 3;
    const PENDING = 4;
    const OVERDUE = 5;

    public static function getStatuses(): array
    {
        return [
            self::IN_PROGRESS,
            self::COMPLETED,
            self::CANCELLED,
            self::PENDING,
            self::OVERDUE,
        ];
    }

    public static function getStatusName(int|null $status): string
    {
        return match ($status) {
            self::IN_PROGRESS => 'In Progress',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
            self::PENDING => 'Pending',
            self::OVERDUE => 'Overdue',
            default => 'Unknown',
        };
    }
}
