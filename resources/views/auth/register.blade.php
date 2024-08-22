@extends('home.layout.layout')

@section('title','Register Account')

@section('login', 'active')

@section('content')

    <div class="formbox">

        <div class="form">
            <h1>Register</h1>
            <form method="post" name="register" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <td><label for="name">Username:</label></td>
                        <td><input type="text" id="name" name="name"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" id="password" name="password"></td>
                    </tr>
                    <tr>
                        <td><label for="password_confirmation">Confirm password:</label></td>
                        <td><input type="password" id="password_confirmation" name="password_confirmation"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input id="submit" type="submit"></td>
                    </tr>
                </table>
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
        </div>

    </div>
@endsection
