@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('createPage') }}" class="btn btn-warning my-3">Добавить</a>
        <div class="row">
            @if (!empty($news))
                @foreach ($news as $n)
                    <div class="card col-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $n->title }}</h5>
                            <p class="card-text">
                                {{ strlen($n->content) > 20 ? substr($n->content, 0, 20) . ' ...' : $n->content }}
                            </p>

                            @if (session('token'))
                                <a href="{{ route('updatePage', $n->id) }}" class="btn btn-warning">Изменить</a>
                            @endif
                            <a href="{{ route('show', $n->id) }}" class="btn btn-primary">Посмотреть</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Новостей нет.</p>
            @endif
        </div>
    </div>
@endsection
