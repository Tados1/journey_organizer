@extends('layouts.app')

@section('content')

<div class="form arrival">
    <form action="" method="POST">
        @csrf

        <label for="transport_type">Choose an option:</label>
        <select id="transport_type" name="transport_type" required>
            <option value="car">Car</option>
            <option value="bus">Bus</option>
            <option value="train">Train</option>
            <option value="airplane">Airplane</option>
            <option value="ship">Ship</option>
        </select>

        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" required>

        <label for="arrival_time">Arrival Time:</label>
        <input type="datetime-local" id="arrival_time" name="arrival_time" required>

        <input type="text" name="from_place" placeholder="from" maxlength="30" required>

        <input type="text" name="to_place" placeholder="to" maxlength="30" required>

        <input type="text" name="arrival_info" placeholder="More info...">

        <button>Submit</button>
    </form>

    <div class="previous-page">
        <a href="{{ route('journeys.show', $id) }}"><i class="fa-regular fa-circle-left"></i> Back to previous page</a>
    </div>
</div>

@endsection