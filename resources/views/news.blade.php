@extends('layouts.app')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>

    @foreach ($news as $item)

        <div class="newsBlock">
            <h3>{{ $item['title'] }}</h3>
            <p>{{ $item['description'] }}</p>
            <a href="{{ route('news.id', $item['id']) }}">Читать подробнее...</a>
        </div>

    @endforeach

@endsection



