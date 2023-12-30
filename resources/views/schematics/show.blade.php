@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')

        <label for="title"> Title: {{ $schematic->title}}</label> <br>
        <label for="description">Description: {{ $schematic->description}}</label>

@endsection
