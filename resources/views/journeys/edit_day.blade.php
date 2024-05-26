@extends('layouts.app')

@section('content')

<div class="day form">
    <form action="{{ route('journeys.day.update', $day->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="day">Day:</label>
        <select id="day" name="day" required>
            <option value="" disabled selected>Select your option</option>
            <option value="Monday" {{ $day->day == 'Monday' ? 'selected' : '' }}>Monday</option>
            <option value="Tuesday" {{ $day->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
            <option value="Wednesday" {{ $day->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
            <option value="Thursday" {{ $day->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
            <option value="Friday" {{ $day->day == 'Friday' ? 'selected' : '' }}>Friday</option>
            <option value="Saturday" {{ $day->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
            <option value="Sunday" {{ $day->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
        </select>

        <label for="transport_type">Transport Type:</label>
        <select id="transport_type" name="transport_type">
            <option value="" {{ $day->transport_type == '' ? 'selected' : '' }}>Select transport type</option>
            <option value="car" {{ $day->transport_type == 'car' ? 'selected' : '' }}>Car</option>
            <option value="bus" {{ $day->transport_type == 'bus' ? 'selected' : '' }}>Bus</option>
            <option value="train" {{ $day->transport_type == 'train' ? 'selected' : '' }}>Train</option>
            <option value="airplane" {{ $day->transport_type == 'airplane' ? 'selected' : '' }}>Airplane</option>
            <option value="ship" {{ $day->transport_type == 'ship' ? 'selected' : '' }}>Ship</option>
        </select>

        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" value="{{ $day->departure_time }}">

        <label for="arrival_time">Arrival Time:</label>
        <input type="datetime-local" id="arrival_time" name="arrival_time" value="{{ $day->arrival_time }}">

        <input type="text" name="from_place" placeholder="from" value="{{ $day->from_place }}" maxlength="30">

        <input type="text" name="to_place" placeholder="to" value="{{ $day->to_place }}" maxlength="30">

        <input type="text" name="description" placeholder="More info..." value="{{ $day->description }}">

        <button>Update</button>
    </form>

    <div class="previous-page">
        <a href="{{ route('journeys.show', $day->journey_id) }}"><i class="fa-regular fa-circle-left"></i> Back to previous page</a>
    </div>
</div>

@endsection