<x-layouts.auth>
    <x-slot name="header">
        <div class="relative">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight uppercase text-center">
                {{ $course->name }}
            </h2>
            @if (auth()->user()->hasRole('admin'))
                <div class="absolute right-20 top-2 flex gap-6 ">
                    <a href="{{ route('courses.edit', ['name' => $course->name]) }}" class="flex gap-1 justify-center items-center">
                        <x-icons.config />Edit
                    </a>
                    <a href="{{ route('courses.update', ['name' => $course->name]) }}" class="flex gap-1 justify-center items-center">
                        <x-icons.add />Add Students
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <livewire:courses.courses-table :course="$course->name" />

</x-layouts.auth>
