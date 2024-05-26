@extends('layouts.app')

@section('content')

<section class="create-organizer">
    <div class="packing">
        <form action="" method="POST">
            @csrf
            <input type="text" name="items" placeholder="Write your items" required>
            <button>Submit</button>
        </form>

            @if ($packing->isNotEmpty())     
            <div class="packing-items">
                <h1>Items:</h1>
                <ul>
                    @foreach ($packing as $pack)
                        <li>{{ $pack->items }}</li>
                    @endforeach
                </ul> 
            </div>
            @endif
    </div>

    <div class="previous-page">
        <a href="{{ route('journeys.show',  $journey_id) }}"><i class="fa-regular fa-circle-left"></i> Back to previous page</a>
    </div>
</section>

@endsection