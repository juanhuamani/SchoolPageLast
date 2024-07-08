@foreach ($users as $user)
    @if ($user->hasRole($role))
        <tr class="border-b dark:border-gray-700">
            <x-table-row>{{ $user->name }}</x-table-row>
            <x-table-row>{{ $user->email }}</x-table-row>
            <x-table-row>{{ $user->created_at }}</x-table-row>
            <x-table-row class="uppercase">{{ $user->roles[0]->name }}</x-table-row>
            <x-table-row>
                @foreach ($user->cursos as $curso)
                    <span class="bg-gray-200 dark:bg-gray-800 dark:text-gray-400 px-2 py-1 rounded-full text-xs">{{ $curso->name }}</span>
                @endforeach
            </x-table-row>
        </tr>
    @endif
@endforeach
