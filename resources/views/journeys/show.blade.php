@extends('layouts.app')

@section('content')

<section class="show">
    
        @if(isset($journey))
            <div class="journey_title">
                <h1>{{ $journey->title }}</h1>
            </div>
            @if(!empty($journey->more_info))
            <div class="journey_section journey_description">
                <h1>More Info</h1>
                <p>{{ $journey->more_info }}</p>
            </div>
            @endif
        @else
            <p>No journey information found.</p>
        @endif

    
        @if (isset($packing) && $packing->isNotEmpty())
            <div class="journey_section show-packing">
                <h1>Packing List</h1>
                @foreach ($packing as $pack)
                    <div class="items">
                        <li>{{ $pack->items }}</li>
                        <div class="update-delete show-packing">
                            <a href="{{ route('journeys.packing.edit', ['id' => $pack->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('journeys.packing.destroy', $pack->id) }}" method="POST" class="destroy">
                                @csrf 
                                @method('DELETE')
                                <button class="trash_icon"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach   
            </div>
        @endif
    
    @if (isset($departure) && $departure->isNotEmpty())
        @foreach ($departure as $dep)
            <div class="journey_section departure">
                <h1>Departure</h1>
                <p>Transport Type: {{ $dep->transport_type }}</p>
                <p>Departure Time: {{ $dep->departure_time }}</p>
                <p>Arrival Time: {{ $dep->arrival_time }}</p>
                <p>From: {{ $dep->from_place }}</p>
                <p>To: {{ $dep->to_place }}</p>
                <p>{{ $dep->departure_info ? 'More Info: ' . $dep->departure_info : '' }}</p>

                <div class="update-delete">
                    <a href="{{ route('journeys.departure.edit', ['id' => $dep->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <form action="{{ route('journeys.departure.destroy', $dep->id) }}" method="POST" class="destroy">
                        @csrf 
                        @method('DELETE')
                        <button class="trash_icon"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif

    @if (isset($day) && $day->isNotEmpty())
        @foreach ($day as $day)
        <div class="journey_section day">
            <h1>{{ $day->day ? $day->day : ''}}</h1>
            <p>{{ $day->transport_type ? 'Transport Type: ' . $day->transport_type : '' }}</p>
            <p>{{ $day->departure_time ? 'Departure Time: ' . $day->departure_time : '' }}</p>
            <p>{{ $day->arrival_time ? 'Arrival Time: ' . $day->arrival_time : '' }}</p>
            <p>{{ $day->from_place ? 'From: ' . $day->from_place : '' }}</p>
            <p>{{ $day->to_place ? 'To: ' . $day->to_place : '' }}</p>
            <p>{{ $day->description ? 'Description: ' . $day->description : '' }}</p>

            <div class="update-delete">
                <a href="{{ route('journeys.day.edit', ['id' => $day->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                <form action="{{ route('journeys.day.destroy', $day->id) }}" method="POST" class="destroy">
                    @csrf 
                    @method('DELETE')
                    <button class="trash_icon"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
        </div>
        @endforeach
    @endif

    @if (isset($arrival) && $arrival->isNotEmpty())
        @foreach ($arrival as $arrival)
            <div class="journey_section departure">
                <h1>Arrival</h1>
                <p>Transport Type: {{ $arrival->transport_type }}</p>
                <p>Departure Time: {{ $arrival->departure_time }}</p>
                <p>Arrival Time: {{ $arrival->arrival_time }}</p>
                <p>From: {{ $arrival->from_place }}</p>
                <p>To: {{ $arrival->to_place }}</p>
                <p>{{ $arrival->arrival_info ? 'More Info: ' . $arrival->arrival_info : '' }}</p>

                <div class="update-delete">
                    <a href="{{ route('journeys.arrival.edit', ['id' => $arrival->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    
                    <form action="{{ route('journeys.arrival.destroy', $arrival->id) }}" method="POST" class="destroy">
                        @csrf 
                        @method('DELETE')
                        <button class="trash_icon"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
                
            </div>
        @endforeach
    @endif

    <div class="create">
        <a href="{{ route('journeys.packing', $journey->journey_id ?? 0) }}">Create packing items</a>
        <a href="{{ route('journeys.departure', $journey->journey_id ?? 0) }}">Create Departure</a>
        <a href="{{ route('journeys.day', $journey->journey_id ?? 0) }}">Create Day</a>
        <a href="{{ route('journeys.arrival', $journey->journey_id ?? 0) }}">Create Arrival</a>
        <a href="{{ route('home') }}">Back to all journeys</a>
    </div>
   

    <form action="{{ route('journeys.destroy', $journey->journey_id) }}" method="POST" class="destroy_whole_journey">
        @csrf 
        @method('DELETE')
        <button>Delete Destination</button>
    </form>
</section>

@endsection