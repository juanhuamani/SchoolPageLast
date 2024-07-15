<?php
    $helper = new \App\Helpers\DateHelper();
?>

<thead>
    <tr class="text-center font-semibold text-gray-900 bg-gray-100 uppercase border-b">
        <th class="px-4 py-3">{{ __('Week') }} {{$weeknumber}}</th>
        @foreach ($week as $day)
            <th class="px-4 py-3">{!! $helper->formatDayHeader($day) !!}<br>{{ $day }}</th>
        @endforeach
    </tr>
</thead>
