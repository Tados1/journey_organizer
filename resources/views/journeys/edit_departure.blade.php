@extends('layouts.app')

@section('content')

<div class="form departure">
    <form action="{{ route('journeys.departure.update', $departure->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="transport_type">Transport Type:</label>
        <select id="transport_type" name="transport_type">
            <option value="car" {{ $departure->transport_type == 'car' ? 'selected' : '' }}>Car</option>
            <option value="bus" {{ $departure->transport_type == 'bus' ? 'selected' : '' }}>Bus</option>
            <option value="train" {{ $departure->transport_type == 'train' ? 'selected' : '' }}>Train</option>
            <option value="airplane" {{ $departure->transport_type == 'airplane' ? 'selected' : '' }}>Airplane</option>
            <option value="ship" {{ $departure->transport_type == 'ship' ? 'selected' : '' }}>Ship</option>
        </select>

        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" value="{{ $departure->departure_time }}">

        <label for="arrival_time">Arrival Time:</label>
        <input type="datetime-local" id="arrival_time" name="arrival_time" value="{{ $departure->arrival_time }}">

        <input type="text" name="from_place" placeholder="from" value="{{ $departure->from_place }}" maxlength="30">

        <input type="text" name="to_place" placeholder="to" value="{{ $departure->to_place }}" maxlength="30">

        <input type="text" name="departure_info" placeholder="More info..." value="{{ $departure->departure_info }}">

        <button type="submit">Update</button>
    </form>

    <div class="previous-page">
        <a href="{{ route('journeys.show', $departure->journey_id) }}"><i class="fa-regular fa-circle-left"></i> Back to previous page</a>
    </div>
</div>

@endsection