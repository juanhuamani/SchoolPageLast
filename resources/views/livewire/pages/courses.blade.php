<x-layouts.auth>
    <x-slot name="header">
        <div class="relative">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight uppercase text-center">
                {{ $course->name }}
            </h2>
            <div class="absolute right-20 top-2 flex gap-2 text-sm">
                @if (auth()->user()->hasRole('admin'))
                    <a href="{{ route('courses.edit', ['name' => $course->name]) }}" class="flex items-center justify-center bg-gray-300 p-1 rounded cursor-pointer">
                        <x-icons.config /> Edit
                    </a>
                    <a href="{{ route('courses.update', ['name' => $course->name]) }}" class="flex items-center justify-center bg-gray-300 p-1 rounded cursor-pointer">
                        <x-icons.add /> Add Students
                    </a>
                @endif
            
                @if (auth()->user()->hasPermissionTo('view attendance'))
                    <a href="{{ route('courses.attendance', ['name' => $course->name]) }}" class="flex items-center justify-center bg-gray-300 p-1 rounded cursor-pointer">
                        <x-icons.view />  Attendances
                    </a>
                @endif
            </div>            
        </div>
    </x-slot>

    <livewire:courses.courses-table :course="$course->name" />

</x-layouts.auth>
