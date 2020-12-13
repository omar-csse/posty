<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 justify-content-between">
        <ul class="navbar-nav mr-auto px-5">
            <li class="nav-item active px-2">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link" href="{{ route('posts') }}">Posts</a>
            </li>
        </ul>

        <ul class="navbar-nav px-5">

            @auth
                <li class="nav-item active px-2">
                    <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item px-2">
                    <form action="{{ route('logout') }}" method="post">
                        <button type="submit" class="btn btn-dark">Logout</button>
                        @csrf
                    </form>
                </li>
            @endauth

            @guest
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    <div style="margin-top: 100px;">
        @yield('content')
    </div>
</body>
</html>