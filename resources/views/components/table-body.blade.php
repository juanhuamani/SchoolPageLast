@foreach (auth()->user()->cursos as $curso)
    @if (auth()->user()->hasRole('admin'))
        <x-render-tables :users="$curso->users" role="student" />
        <x-render-tables :users="$curso->users" role="teacher" />
    @elseif (auth()->user()->hasRole('teacher'))
        <x-render-tables :users="$curso->users" role="student" />
    @elseif (auth()->user()->hasRole('student'))
        <x-render-tables :users="$curso->users" role="teacher" />
    @endif
@endforeach
