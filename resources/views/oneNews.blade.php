@extends('layouts.app')

@section('title')Новости@endsection

@section('content')
    <h1>Вывод одной новости</h1>
        <div class="newsBlock">
            <h3>{{ $oneNews['title'] }}</h3>
            <p>{{ $oneNews['description'] }}</p>
            <a href="{{ route('news') }}">назад</a>
        </div>
@endsection



