<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function getWeekFromNumber($weekNumber)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $startOfWeek = $startOfMonth->copy()->addWeeks($weekNumber - 1)->startOfWeek();
        $daysOfWeek = [];

        for ($i = 0; $i < 7; $i++) {
            $daysOfWeek[] = $startOfWeek->copy()->addDays($i)->format('Y-m-d');
        }

        return $daysOfWeek;
    }
}
