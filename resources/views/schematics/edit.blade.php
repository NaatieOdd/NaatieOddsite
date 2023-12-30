@extends('home.layout.layout')

@section('title','Home')

@section('schematics', 'active')

@section('content')

    <form action="{{route('schematics.update', $schematics)}}" method="post" name="schematics">
        @csrf
        @method('PUT')
        <label for="title">Project title:</label>
        <input type="text" id="title" name="title" value="{{ $schematics->title}}"><br>
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="{{$schematics->description}}"><br>
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
