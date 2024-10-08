<div class="max-w-sm rounded-lg shadow bg-gray-800 border-gray-700" >
    <img class="rounded-t-lg" src="https://picsum.photos/400/200" alt="" />
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-300 dark:text-white">{{$course->name}}</h5>
        {!!$course->description !!}
        <a href="{{route('courses', ['name' => $course->name])}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            View Course
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>