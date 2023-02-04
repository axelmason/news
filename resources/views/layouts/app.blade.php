<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>@yield('title', 'News')</title>
</head>

<body>
    <header class="bg-dark w-100 py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="text-decoration-none">
                <h1 class="title text-center text-white">Новости</h1>
            </a>
            <div class="guest" style="display: block;">
                @if(!session('token'))
                    <a href="{{ route('loginPage') }}" class="btn btn-light">Логин</a>
                    <a href="{{ route('registerPage') }}" class="btn btn-light">Регистрация</a>
                @else
                    <a href="{{ route('logout') }}" class="btn btn-light">Выйти</a>
                @endif
            </div>
        </div>
    </header>
    <div class="container col-3">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $e)
                    <p>{{ $e }}</p>
                @endforeach
            </div>
        @endif
    </div>

    @yield('content')
</body>

</html>
