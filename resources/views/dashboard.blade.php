<x-layouts.auth>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-screen max-w-screen-xl m-auto">
        <div class="p-4 space-y-4 sm:p-6 sm:space-y-6">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
                <x-layouts.header-card label="Welcome" :value="auth()->user()->name" />
            </div>

            <div class="grid gap-4 lg:grid-cols-2 sm:gap-6">
                <!-- Card -->
                <div class="p-4 md:p-5 min-h-[410px] flex flex-col  gap-3 bg-white border shadow-sm rounded-xl ">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-sm text-gray-500">
                                Courses
                            </h2>
                        </div>
                    </div>
                    <div  >
                        <livewire:dashboard.courses />
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
                    <!-- Header -->
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-sm text-gray-500">
                                Teachers
                            </h2>
                        </div>
                    </div>
                    <div >
                        <livewire:dashboard.teachers />
                    </div>
                    <!-- End Header -->
                </div>
            </div>
            <div class="">
                <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
                    <!-- Header -->
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-sm text-gray-500">
                                Students
                            </h2>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <livewire:dashboard.students />
                    </div>
                    <!-- End Header -->
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>
