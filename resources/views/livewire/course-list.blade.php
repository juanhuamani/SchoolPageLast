<div class="py-12">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12 grid-cols-3 grid gap-10">
        @foreach ($courses as $course)  
            <x-card-course :course="$course" />
        @endforeach
    </div>
</div>
