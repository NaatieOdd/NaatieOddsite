@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')
    <div class="schematic">
        <label for="title"> Title: {{ $schematic->title}}</label> <br>
        <label for="description">Description: {{ $schematic->description}}</label> <br>
        <div><label for="creator">Creator: {{$schematic->creator}}</label></div>
        <button onclick="window.location='{{ route('schematics.download', ['id' => $schematic->id]) }}'">Download
            Schematic
        </button>
    </div>
@endsection
