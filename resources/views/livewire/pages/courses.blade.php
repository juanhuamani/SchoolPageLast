<x-layouts.auth>
    <x-slot name="header">
        <div class="relative">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight uppercase text-center">
                {{ $course->name }}
            </h2>
            @if (auth()->user()->hasRole('admin'))
                <div class="absolute right-20 top-3 flex gap-6 ">
                    <a href="{{ route('courses.edit', ['name' => $course->name]) }}" class="flex gap-1 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-cog">
                            <path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" />
                            <path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            <path d="M12 2v2" />
                            <path d="M12 22v-2" />
                            <path d="m17 20.66-1-1.73" />
                            <path d="M11 10.27 7 3.34" />
                            <path d="m20.66 17-1.73-1" />
                            <path d="m3.34 7 1.73 1" />
                            <path d="M14 12h8" />
                            <path d="M2 12h2" />
                            <path d="m20.66 7-1.73 1" />
                            <path d="m3.34 17 1.73-1" />
                            <path d="m17 3.34-1 1.73" />
                            <path d="m11 13.73-4 6.93" />
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('courses.update', ['name' => $course->name]) }}" class="flex gap-1 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                            viewBox="0 0 256 256">
                            <path
                                d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm-16,72h16v48H192Zm16-16H192V48h16ZM48,48H176V208H48ZM208,208H192V168h16v40Zm-56.25-42a39.76,39.76,0,0,0-17.19-23.34,32,32,0,1,0-45.12,0A39.84,39.84,0,0,0,72.25,166a8,8,0,0,0,15.5,4c2.64-10.25,13.06-18,24.25-18s21.62,7.73,24.25,18a8,8,0,1,0,15.5-4ZM96,120a16,16,0,1,1,16,16A16,16,0,0,1,96,120Z">
                            </path>
                        </svg>
                        Add Alumns
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <livewire:courses.courses-table :course="$course->name" />

</x-layouts.auth>
