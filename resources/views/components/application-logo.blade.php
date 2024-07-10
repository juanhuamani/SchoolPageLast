<!-- Logo -->
<a {{ $attributes->merge(['class' => 'flex items-center text-xl font-semibold rounded-xl focus:outline-none focus:opacity-80']) }}
    href="{{route('home')}}" >
    <svg xmlns="http://www.w3.org/2000/svg" width="1.13em" height="1em" viewBox="0 0 576 512" class="mr-2">
        <path fill="currentColor"
            d="M288 0h112c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16h-79.3l89.6 64H512c35.3 0 64 28.7 64 64v224c0 35.3-28.7 64-64 64H336V400c0-26.5-21.5-48-48-48s-48 21.5-48 48v112H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h101.7L256 95.5V32c0-17.7 14.3-32 32-32m48 240a48 48 0 1 0-96 0a48 48 0 1 0 96 0M80 224c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64c0-8.8-7.2-16-16-16zm368 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16M80 352c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64c0-8.8-7.2-16-16-16zm384 0c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64c0-8.8-7.2-16-16-16z" />
    </svg>
    <span>
        SchoolWire
    </span>
    @if (auth()->check())
        {{-- ROLE --}}
        @if (auth()->user()->getRoleNames()->isNotEmpty())
            <ul>
                @foreach (auth()->user()->getRoleNames() as $role)
                    <li class="text-blue-500">-{{ $role }}</li>
                @endforeach
            </ul>
        @endif
    @endif

</a>
<!-- End Logo -->
