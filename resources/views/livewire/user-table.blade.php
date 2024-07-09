<div class="py-12">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Filtros de Búsqueda -->
        <div class="mb-4">
            <div class="grid grid-cols-5 gap-4 place-items-center">
                <div>
                    <x-text-input id="name" type="text" name="name" autofocus  placeholder="{{ __('Name') }}" wire:model="searchName" />
                </div>
                <div>
                    <x-text-input id="email" type="text" name="email" autofocus  placeholder="{{ __('Email') }}" wire:model="searchEmail" />
                </div>
                <div>
                    <x-text-input id="create" type="text" name="create" autofocus  placeholder="{{ __('Create') }}" wire:model="searchCreate" />
                </div>
                <div>
                    <x-text-input id="role" type="text" name="role" autofocus  placeholder="{{ __('Role') }}" wire:model="searchRole" />
                </div>
                <div class="">
                    <x-primary-button wire:click="filter">Filtrar</x-primary-button>
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
                    @if ($users->count())
                        <x-render-tables :users="$users" />
                        
                    @else
                        <tr>
                            <td colspan="5" class="py-4">
                                <p class="text-center text-gray-400">No hay registros</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-10">
            {{ $users->links() }}
        </div>
    </div>
</div>
