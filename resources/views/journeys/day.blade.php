@extends('layouts.app')

@section('content')

<div class="day form">
    <form action="" method="POST">
        @csrf

        <label for="day">Day:</label>
        <select id="day" name="day" required>
            <option value="" disabled selected>Select day</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>

        <label for="transport_type">Transport Type:</label>
        <select id="transport_type" name="transport_type" >
            <option value="" disabled selected>Select transport type</option>
            <option value="car">Car</option>
            <option value="bus">Bus</option>
            <option value="train">Train</option>
            <option value="airplane">Airplane</option>
            <option value="ship">Ship</option>
        </select>

        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time">

        <label for="arrival_time">Arrival Time:</label>
        <input type="datetime-local" id="arrival_time" name="arrival_time">

        <input type="text" name="from_place" placeholder="From" maxlength="30">

        <input type="text" name="to_place" placeholder="To" maxlength="30">

        <input type="text" name="description" placeholder="More info...">

        <button>Submit</button>
    </form>

    <div class="previous-page">
        <a href="{{ route('journeys.show', $id) }}"><i class="fa-regular fa-circle-left"></i> Back to previous page</a>
    </div>
</div>

@endsection