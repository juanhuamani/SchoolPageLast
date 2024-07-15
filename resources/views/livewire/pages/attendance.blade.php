<x-layouts.auth>
    <x-slot name="header">
        <div class="relative">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight uppercase text-center">
                {{ $course->name }}
            </h2>
        </div>
    </x-slot>
    <livewire:courses.table :course="$course" />
</x-layouts.auth>
