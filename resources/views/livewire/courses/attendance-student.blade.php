<div>
    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-student-attendance')"
    >{{ __('Take Attendance') }}</x-primary-button>
    <x-modal name="confirm-student-attendance" :show="$errors->isNotEmpty()" focusable>
        <form class="p-6" wire:submit.prevent="submit">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Take Attendance') }}
            </h2>
            <ul class="p-6 h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700" aria-labelledby="dropdownSearchButton">
                @foreach($users as $user)
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-400 ">
                            <input id="checkbox-item-11" type="checkbox" name="selected_users[]" wire:model="selected_users" value="{{ $user->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="checkbox-item-11" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">{{ $user->name }}</label>
                        </div>
                    </li>
                @endforeach
            </ul>
            <x-primary-button class="mt-5">Attendance</x-primary-button>
        </form>
    </x-modal>
</div>
