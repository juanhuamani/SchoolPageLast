<x-guest>
    <!-- Logo-->
    <div class="w-52 mb-10">
        <x-application-logo />
    </div>

    <!-- Session Status -->
    <div class="text-center">
        <x-auth-session-status class="mb-4" :status="session('status')" />
    </div>

    <form wire:submit="register" class="">
        <!-- Email Address -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus
                autocomplete="name" wire:model="form.name" />
            <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" 
                wire:model="form.email" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                wire:model="form.password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" class="block mt-1 w-full" name="role" wire:model="form.role">
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="user">Student</option>
            </select>
            <x-input-error :messages="$errors->get('form.role')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest>
