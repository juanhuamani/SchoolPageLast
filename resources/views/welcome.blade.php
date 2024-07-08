<x-layouts.auth>
    {{ auth()->user()->name }}
    <br>
    {{ auth()->user()->email }}
    <br>
    {{ auth()->user()->getRoleNames() }}
    <br>

    <a href={{ route('logout') }}>Logout</a>
    <h1>wawaw</h1>
    <h2>wawaw</h2>
</x-layouts.auth>
