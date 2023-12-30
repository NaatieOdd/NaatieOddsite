@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')
    <div class="schematics">
        <h1>All schematics</h1>
        <div>
            <a href="{{route('schematics.create')}}">Create Schematic</a>
        </div>
        <br>
        @foreach($schematics as $schematic)
            <div class="schematics">

                <div><label for="id">ID:</label>{{$schematic->id}}</div>

                <div><label for="title">Title: </label>{{$schematic->title}}</div>

                <div><label for="description">Description: </label> {{$schematic->description}}</div>

                <div><label for="creator">{{$schematics->creator}}</label></div>

                <div>
                    <a href="{{route('schematics.show', $schematic->id)}}">Show Schematic</a>
                </div>
                <div class="links">
                    <a href="{{route('schematics.edit', $schematic->id)}}">Edit</a>
                </div>
                <form action="{{route('schematics.destroy', $schematic->id)}}" method="post">
                    @method("DELETE")
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </div>
        @endforeach
    </div>
@endsection
