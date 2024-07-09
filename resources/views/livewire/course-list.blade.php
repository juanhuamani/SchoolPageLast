<div>
    @foreach ($courses as $course)
        <div class="card">
            <div class="card-header">
                <h3>{{ $course['name'] }}</h3>
            </div>
            <div class="card-body">
                <p>Created at: {{ \Carbon\Carbon::parse($course['created_at'])->format('d-m-Y H:i') }}</p>
                <p>Updated at: {{ \Carbon\Carbon::parse($course['updated_at'])->format('d-m-Y H:i') }}</p>
            </div>
        </div>
    @endforeach
</div>
