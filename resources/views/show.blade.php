@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <a href="{{ route('home') }}" class="text-primary">Домой</a>
    <div class="card px-3 py-2">
        <h2 class="text-center">{{ $news->title }}</h2>
        <p>{{ $news->content }}</p>
    </div>
</div>
@endsection
