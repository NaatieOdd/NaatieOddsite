<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Nathan Oddings portfolio">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/style.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
</head>
<body>
<header>
    <div class="titlenav">
        <div><h1>NaatieOdd</h1></div>
        <a title="menu for other pages" href="javascript:void(0);" class="icon" onclick="toggleMenu()">
            <i title="menu for other pages" class="fa fa-bars"></i>
        </a>
    </div>
    <div class="navbar">
        <div id="links">
            <div><a class="@yield('home')" href="/"><h4>Home</h4></a></div>
            <div><a class="@yield('schematics')" href="{{route('schematics.index')}}"><h4>Schematic library</h4></a></div>
        </div>
    </div>
</header>
<main>
    <div class="text">
        @yield('content')
    </div>
    <div class="socials">
        <a href="https://github.com/NaatieOdd"><img alt="github" src="{{ asset('pictures/github.png') }}"></a>
        <a href="https://discord.com/users/343076557088096258"><img alt="discord" src="{{ asset('pictures/discord.png') }}"></a>
    </div>
</main>
<footer>
    <div class="copyright"><p><b>©</b>NaatieOdd 2023-2023</p></div>
</footer>
</body>
</html>
<script>
    function toggleMenu() {
        var x = document.getElementById("links");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>

