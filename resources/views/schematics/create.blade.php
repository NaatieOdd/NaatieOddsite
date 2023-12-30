@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')
    <form action="{{route('schematics.store')}}" method="post" name="schematics" enctype="multipart/form-data">
        @csrf
        <label for="title">Schematic title:</label>
        <input type="text" id="title" name="title"><br>
        <label for="description">Description</label>
        <input type="text" id="description" name="description"><br>
        <label for="creator">Creator:</label>
        <input type="text" id="creator" name="creator"><br>
        <label for="file">File</label>
        <input id="file" type="file" name="file"/>
        <button id="file" name="file">Upload</button><br>
        <input type="submit">
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
