<div class="py-12">
    <div class="mx-auto max-w-screen-xl px-4 text-center">
        <div class="flex gap-3">
            <div class="">
                <x-text-input wire:model="search" placeholder="Search student" class="flex-1" />
                <x-input-error :messages="$errors->get('weekNumber')" class="mt-2" />
            </div>
            <x-text-input wire:model="weekNumber" placeholder="Week" class="flex-1" />
            <x-primary-button wire:click="filter">{{ __('Search') }}</x-primary-button>
        </div>
        <table class="w-full mt-10">
            <x-courses.table-header :week="$week" :weeknumber="$weekNumber"/>
            <x-courses.table-body :users="$users" :attendance="$attendance" :week="$week" />
        </table>
    </div>
</div>
