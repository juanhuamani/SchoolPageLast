<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Course') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your course is deleted, all of its resources and data will be permanently deleted. Before deleting your course, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-course-deletion')"
    >{{ __('Delete Course') }}</x-danger-button>

    <x-modal name="confirm-course-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit.prevent="deleteCourse" class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete this course?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once the course is deleted, all of its resources and data will be permanently deleted. Please enter the course name to confirm you would like to permanently delete your course.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="courseconfirm" value="{{ __('Course Confirm') }}" class="sr-only" />

                <x-text-input
                    wire:model="courseconfirm"
                    id="courseconfirm"
                    name="courseconfirm"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Course Name') }}"
                />

                <x-input-error :messages="$errors->get('courseconfirm')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Course') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
