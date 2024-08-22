@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')
    <div class="schematics">
        <h1>All schematics</h1>
        <div>

            <form action="{{ route('schematics.search') }}" method="get">
                <input type="text" name="keyword" placeholder="Search...">
                <button type="submit">Search</button>

            </form>

            <div>
                <button onclick="window.location='{{route('schematics.create')}}'">Create your own schematic</button>
                <button onclick="window.location='{{route('pages.personal')}}'">See your own schematics</button>
            </div>
        </div>
        <br>
        @foreach($schematics as $schematic)
            <div class="schematic">

                <div><label for="title">Title: </label>{{$schematic->title}}</div>

                <div><label for="description">Description: {{$schematic->description}}</label></div>

                <div><label for="creator">Creator:{{ $schematic->user->name }}</label></div>

                <div>
                    <button onclick="window.location='{{ route('schematics.show', $schematic) }}'">Show Schematic
                    </button>
                </div>
                <br>
            </div>
        @endforeach
    </div>
@endsection
