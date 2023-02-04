@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Авторизация</h2>
    <div class="row align-items-center flex-column">
        <form action="" class="col-lg-4 col-12" method="POST">
            @csrf
            <input type="text" name="email" placeholder="Email" class="form-control my-1">
            <input type="password" name="password" placeholder="Пароль" class="form-control my-1">
            <button type="submit" class="btn btn-outline-dark w-100 my-1">Войти</button>
        </form>
    </div>
</div>
@endsection
