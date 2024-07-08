<div class="py-12">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Filtros de Búsqueda -->
        <div class="mb-4">
            <div class="grid grid-cols-4 gap-4">
                <div>
                    <input type="text" wire:model="searchName" placeholder="{{ __('Name') }}" class="w-full px-4 py-2 border rounded-lg" />
                </div>
                <div>
                    <input type="text" wire:model="searchEmail" placeholder="{{ __('Email') }}" class="w-full px-4 py-2 border rounded-lg" />
                </div>
                <div>
                    <input type="text" wire:model="searchCreate" placeholder="{{ __('Create') }}" class="w-full px-4 py-2 border rounded-lg" />
                </div>
                <div>
                    <input type="text" wire:model="searchRole" placeholder="{{ __('Role') }}" class="w-full px-4 py-2 border rounded-lg" />
                </div>
            </div>
        </div>
        <!-- Tabla -->
        <div class="relative shadow-md sm:rounded-lg overflow-hidden">
            <table class="w-full text-sm text-center text-gray-400">
                <thead class="text-xs uppercase bg-gray-700">
                    <tr>
                        <x-table-header>{{ __('Name') }}</x-table-header>
                        <x-table-header>{{ __('Email') }}</x-table-header>
                        <x-table-header>{{ __('Create') }}</x-table-header>
                        <x-table-header>{{ __('Role') }}</x-table-header>
                        <x-table-header>{{ __('Curses') }}</x-table-header>
                    </tr>
                </thead>
                <tbody>
                    <x-table-body />
                </tbody>
            </table>
        </div>
    </div>
    {{$users}}
</div>