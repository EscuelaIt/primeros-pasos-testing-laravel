<?php

namespace App\Lib;

use Carbon\Carbon;
use InvalidArgumentException;

class ActivityTimeStamp
{
    private Carbon $time;

    public function __construct(string $hour, string $minute)
    {
        $timeString = sprintf('%02d:%02d', $hour, $minute);

        $validator = new ValidateTime($timeString);

        if (!$validator->isValid()) {
            throw new InvalidArgumentException("Invalid time format: {$timeString}");
        }

        $this->time = Carbon::createFromTime($hour, $minute);
    }

    public function toFormattedString(): string
    {
        return $this->time->format('H:i');
    }

    public function isLaterThan(self $other): bool
    {
        return $this->time->greaterThan($other->time);
    }
}

