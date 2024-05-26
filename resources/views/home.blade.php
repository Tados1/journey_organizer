@extends('layouts.app')

@section('content')

<div class="home">
    <ul>
        @foreach($journeys as $journeys)
            <li><a href="{{ route('journeys.show', $journeys['journey_id']) }}">{{ $journeys['title'] }}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('journeys.create') }}" class="create-destination">Create destination</a>
</div>

@endsection
