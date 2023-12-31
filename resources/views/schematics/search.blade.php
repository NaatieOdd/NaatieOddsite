@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')

    @section('content')
        <h1>Search Results</h1>

        @if ($schematics->count() > 0)
            @foreach($schematics as $schematic)
                <div class="schematic">

                    <div><label for="title">Title: </label>{{$schematic->title}}</div>

                    <div><label for="description">Description: {{$schematic->description}}</label></div>

                    <div><label for="creator">Creator: {{$schematic->creator}}</label></div>

                    <div>
                        <button onclick="window.location='{{ route('schematics.show', $schematic->id) }}'">Show Schematic
                        </button>
                    </div>
                    <br>
                </div>
            @endforeach
        @else
            <p>No schematics found for the keyword "{{ $keyword }}".</p>
        @endif

    @endsection
