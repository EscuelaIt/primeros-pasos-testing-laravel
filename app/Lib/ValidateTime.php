<?php

namespace App\Lib;

class ValidateTime {

    private $time;

    public function __construct($time) {
        $this->time = $time;
    }

    public function isValid() {
        if(!$this->isValidFormat()) {
            return false;
        }

        [$hour, $minutes] = explode(':', $this->time);

        if(!$this->isValidHour($hour)) {
            return false;
        }

        return $this->isValidMinutes($minutes);
    }

    private function isValidFormat(): bool
    {
        return preg_match('/^\d{2}:\d{2}$/', $this->time) === 1;
    }

    private function isValidHour(string $hour): bool
    {
        $hour = (int) $hour;
        return $hour >= 0 && $hour <= 23;
    }

    private function isValidMinutes(string $minutes): bool
    {
        $minutes = (int) $minutes;
        return in_array($minutes, [0, 15, 30, 45], true);
    }
}
