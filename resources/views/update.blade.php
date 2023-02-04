@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Изменить новость</h2>
        <div class="d-flex align-items-center flex-column">
            <div class="col-lg-4 col-12">
                <form action="{{ route('update', $news->id) }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="Заголовок" class="form-control my-1"
                        value="{{ $news->title }}">
                    <textarea name="content" placeholder="Содержание" rows="5" class="w-100 form-control" style="resize: none;">{{ $news->content }}</textarea>
                    <button type="submit" class="btn btn-outline-dark w-100 my-1">Изменить</button>
                </form>
                <a href="{{ route('delete', $news->id) }}" class="btn btn-danger w-100 my-1">Удалить</a>
            </div>
        </div>
    </div>
@endsection
