@extends('layouts.app')

@section('content')

<section class="create-container">
    <h1>Create New Destination</h1>

    <form action="/journeys" method="POST" class="create">
        @csrf
        <input type="text" name="title" placeholder="Destination" required>
        <input type="text" name="more_info" placeholder="Description">
        <button>Create</button>
    </form>
</section>

@endsection