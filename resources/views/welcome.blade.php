<x-layouts.auth>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Courses') }}
            </h2>
            @if (auth()->user()->getRoleNames()->contains('admin'))
                <livewire:courses.create-course>
            @endif
        </div>
    </x-slot>
    <livewire:course-list>
</x-layouts.auth>
