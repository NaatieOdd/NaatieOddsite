@extends('home.layout.layout')

@section('title','Your Schematics')

@section('schematics', 'active')

@section('content')
    <div class="schematics">
        <h1>Your schematics:</h1>
        <div class="schematics-container">
            @foreach($schematics as $schematic)
                <div class="schematic">
                    <div>
                        <label for="title">Title:{{$schematic->title}}: </label>
                        <div><label for="description">Description: {{$schematic->description}}</label></div>
                        <div><label for="creator">Creator:{{ $schematic->user->name }}</label></div>
                    </div>
                    <div>
                        <button onclick="window.location='{{ route('schematics.show', $schematic) }}'">Show Schematic
                        </button>
                    </div>

                </div>
            @endforeach
        </div>
@endsection
