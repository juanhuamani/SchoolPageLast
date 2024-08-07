<div>
    <div class="p-3 flex gap-3">
        <div class="relative flex-1">
          <x-text-input type="text" id="input-group-search" wire:model="search" placeholder="{{ __('Search student') }}"/>
        </div>
        <x-primary-button wire:click="resetFilter" >Reset</x-primary-button>
        <x-primary-button wire:click="filter" >Search</x-primary-button>
      </div>
    <form class=" bg-white rounded-lg shadow w-full" wire:submit.prevent="submit">
        <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700" aria-labelledby="dropdownSearchButton">
            @foreach($users as $user)
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-400 ">
                        <input id="checkbox-item-11" type="checkbox" name="selected_users[]" wire:model="selected_users" value="{{ $user->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="checkbox-item-11" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">{{ $user->name }}</label>
                    </div>
                </li>
            @endforeach
        </ul>
        <x-primary-button class="mt-5">Add Alumns</x-primary-button>
    </form>
</div>

