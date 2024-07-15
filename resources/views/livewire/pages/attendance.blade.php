<x-layouts.auth>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight uppercase text-center">
                {{ $course->name }}
            </h2>
                @if (auth()->user()->hasPermissionTo('take attendance'))
                    <livewire:courses.attendance-student :course="$course" />
                @endif
        </div>
    </x-slot>
    <livewire:courses.table :course="$course" />
</x-layouts.auth>
