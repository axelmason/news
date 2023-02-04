@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Добавить новость</h2>
    <div class="row align-items-center flex-column">
        <form action="{{ route('create') }}" class="col-lg-4 col-12" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Заголовок" class="form-control my-1">
            <textarea name="content" placeholder="Содержание" rows="5" class="w-100 form-control"></textarea>
            <button type="submit" class="btn btn-outline-dark w-100 my-1">Добавить</button>
        </form>
    </div>
</div>
@endsection
