@extends('layouts.app')

@section('content')

<section>
    <div class="packing">
        <form action="{{ route('journeys.packing.update', $packing->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="items" placeholder="Your packing item here" value="{{ $packing->items }}" required>
            <button>Submit</button>
        </form>

        <div class="previous-page">
            <a href="{{ route('journeys.show',  $packing->journey_id) }}"><i class="fa-regular fa-circle-left"></i> Back to previous page</a>
        </div>
    </div>
</section>

@endsection