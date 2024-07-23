<div class="py-12">
    <div class="mx-auto max-w-screen-xl px-4 text-center">
        <div class="flex justify-between gap-3">
            <div class="">
                <x-text-input wire:model="search" placeholder="Search student" class="flex-1" />
                <x-input-error :messages="$errors->get('weekNumber')" class="mt-2" />
            </div>
            <div class="relative flex items-center max-w-[11rem]">
                <x-input-number wire:click="lessWeek" placeholder="Week"
                    class="flex-1"><x-icons.less /></x-input-number>
                <input type="text"
                    class="bg-gray-50 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                    value={{$weekNumber}} />
                <div
                    class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                    <x-icons.add />
                    <span>Weeks</span>
                </div>
                <x-input-number wire:click="moreWeek" class="flex-1"><x-icons.plus /></x-input-number>
            </div>
            <x-primary-button wire:click="filter">{{ __('Search') }}</x-primary-button>
        </div>
        <table class="w-full mt-10">
            <x-courses.table-header :week="$week" :weeknumber="$weekNumber" />
            <x-courses.table-body :users="$users" :attendance="$attendance" :week="$week" />
        </table>
    </div>
</div>
