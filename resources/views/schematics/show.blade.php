


@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')

        <label for="title"> Title: {{ $schematic->title}}</label> <br>
        <label for="description">Description: {{ $schematic->description}}</label>

        <input type="button" value='download' onclick="<?php use Illuminate\Support\Facades\Storage; $filename = $schematic->title. ".schematic"; return Storage::download('storage/app/public/ '. $filename, $filename,  ); ?>" />

@endsection
