<x-layouts.guest >
    <!-- Session Status -->
    <div class="text-center">
        <x-auth-session-status class="mb-4" :status="session('status')" />
    </div>

    <form wire:submit="login" class="">
        <!-- Email Address -->
        <div>
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus
                autocomplete="name" wire:model="form.name" />
            <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                wire:model="form.password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="/" wire:navigate>
                {{ __('Forgot your password?') }}
            </a>


            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-layouts.guest>
