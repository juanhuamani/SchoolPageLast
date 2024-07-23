<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function getWeekFromNumber($weekNumber)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $startOfWeek->addWeeks($weekNumber);
        $daysOfWeek = [];

        for ($i = 0; $i < 7; $i++) {
            $daysOfWeek[] = $startOfWeek->copy()->addDays($i)->format('Y-m-d');
        }

        return $daysOfWeek;
    }

    public function formatDayHeader($day)
    {
        $formattedDay = Carbon::parse($day)->format('l');
        return $formattedDay ;
    }
}
