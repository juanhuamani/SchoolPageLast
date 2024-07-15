<thead>
    <tr class="text-center font-semibold text-gray-900 bg-gray-100 uppercase border-b">
        <th class="px-4 py-3">Alumno</th>
        @foreach ($week as $day)
            <th class="px-4 py-3">{{ \Carbon\Carbon::parse($day)->format('l') }}<br>{{ $day }}</th>
        @endforeach
    </tr>
</thead>
