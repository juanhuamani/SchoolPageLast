<div>
    <table class="divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                @if (auth()->user()->getRoleNames()->contains('admin'))
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                @endif
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($students as $index => $user)
                <div wire:key= "user-{{$user->id}}">
                    <x-layouts.user-pill :user="$user" :index="$index" />
                </div>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
