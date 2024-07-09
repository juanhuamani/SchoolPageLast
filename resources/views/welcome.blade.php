<x-layouts.auth>
    @foreach (auth()->user()->courses()->pluck('name') as $course)
        {{ $course }}
    @endforeach
</x-layouts.auth>
