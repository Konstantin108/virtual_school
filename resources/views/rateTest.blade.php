@forelse($rating as $rate)
    <h3>{{ $rate->theme_completed_id }}</h3>
@empty
    <h1>test</h1>
@endforelse
