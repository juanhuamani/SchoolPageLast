<x-layouts.auth>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:courses.update-course :name="$course->name" :description="$course->description" :id="$course->id">
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header class="mb-5">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Delete Course') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your course is deleted, all of its resources and data will be permanently deleted. Before deleting your course, please download any data or information that you wish to retain.') }}
                        </p>
                    </header>
                    <livewire:courses.delete-course :course="$course">
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>
