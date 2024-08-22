@extends('home.layout.layout')

@section('title','Log in')

@section('login', 'active')

@section('content')

    <div class="formbox">

        <div class="form">
            <h1>Login</h1>
            <form method="post" name="login" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" id="password" name="password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a>Forgot your password?</a></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input id="submit" type="submit"></td>
                    </tr>
                </table>
            </form>
            <a href="/register">New here?</a>
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
