<div>
    <table class="min-w-full divide-y divide-gray-200">
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
            @foreach ($courses as $index => $course)
                <div wire:key= "course-{{$course->id}}">
                    <x-layouts.course-pill :course="$course" :index="$index" />
                </div>
            @endforeach
        </tbody>
    </table>
</div>
