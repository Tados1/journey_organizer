@extends('layouts.app')

@section('content')

<div class="form arrival">
    <form action="{{ route('journeys.arrival.update', $arrival->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="transport_type">Transport Type:</label>
        <select id="transport_type" name="transport_type">
            <option value="car" {{ $arrival->transport_type == 'car' ? 'selected' : '' }}>Car</option>
            <option value="bus" {{ $arrival->transport_type == 'bus' ? 'selected' : '' }}>Bus</option>
            <option value="train" {{ $arrival->transport_type == 'train' ? 'selected' : '' }}>Train</option>
            <option value="airplane" {{ $arrival->transport_type == 'airplane' ? 'selected' : '' }}>Airplane</option>
            <option value="ship" {{ $arrival->transport_type == 'ship' ? 'selected' : '' }}>Ship</option>
        </select>

        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" value="{{ $arrival->departure_time }}">

        <label for="arrival_time">Arrival Time:</label>
        <input type="datetime-local" id="arrival_time" name="arrival_time" value="{{ $arrival->arrival_time }}">

        <input type="text" name="from_place" placeholder="from" value="{{ $arrival->from_place }}" maxlength="30">

        <input type="text" name="to_place" placeholder="to" value="{{ $arrival->to_place }}" maxlength="30">

        <input type="text" name="arrival_info" placeholder="More info..." value="{{ $arrival->arrival_info }}">

        <button type="submit">Update</button>
    </form>

    <div class="previous-page">
        <a href="{{ route('journeys.show', $arrival->journey_id) }}"><i class="fa-regular fa-circle-left"></i> Back to previous page</a>
    </div>
</div>

@endsection