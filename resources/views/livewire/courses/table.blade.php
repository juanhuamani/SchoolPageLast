<div class="py-12">
    <div class="mx-auto max-w-screen-xl px-4 text-center">
        <x-text-input wire:model="search" placeholder="Search student" class="w-full" />
        <x-text-input wire:model="weekNumber" placeholder="Week" class="w-full" />
        <x-primary-button wire:click="filter" class="w-full">Search</x-primary-button>
        <table class="w-full">
            <livewire:courses.table-header :week="$week" />
            <livewire:courses.table-body :users="$users" :attendance="$attendance" :week="$week" />
        </table>
    </div>
</div>
