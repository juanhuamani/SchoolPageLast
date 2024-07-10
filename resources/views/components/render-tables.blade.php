@foreach ($users as $user)
    <tr class="border-b dark:border-gray-700">
        <x-table-row>{{ $user->name }}</x-table-row>
        <x-table-row>{{ $user->email }}</x-table-row>
        <x-table-row>{{ $user->created_at }}</x-table-row>
        <x-table-row class="uppercase">{{ $user->roles[0]->name }}</x-table-row>
    </tr>
@endforeach
