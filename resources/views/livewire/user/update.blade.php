<section class="space-y-6">
    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-update-{{ $user->id }}')"
    >{{ __('Update Account') }}</x-primary-button>

    <x-modal name='confirm-user-update-{{ $user->id }}' :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="update" class="p-6">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Update Profile') }}
            </h2>

            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" class="" />

                <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Name') }}" autocomplete="name" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="email" value="{{ __('Email') }}" class="" />

                <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-3/4"
                    placeholder="{{ __('Email') }}" autocomplete="name" />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Update Profile') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>

