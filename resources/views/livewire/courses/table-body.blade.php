<tbody class="bg-white">
    @foreach ($users as $user)
        <tr class="text-gray-700">
            <td class="px-4 py-3 border">{{ $user->name }}</td>
            @foreach ($week as $day)
                <td>
                    @if (isset($attendance[$user->id][$day]) && $attendance[$user->id][$day])
                        <x-present />
                    @else
                        <x-absent />
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</tbody>