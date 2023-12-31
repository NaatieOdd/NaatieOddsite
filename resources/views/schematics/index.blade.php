@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')
    <div class="schematics">
        <h1>All schematics</h1>
        <div>
            <button onclick="window.location='{{route('schematics.create')}}'">Create Schematic
            </button>
        </div>
        <br>
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
    </div>
@endsection
