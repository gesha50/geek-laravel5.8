@extends('layouts.app')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>
    <div class="d-flex flex-wrap justify-content-between">
        @foreach ($news as $item)
        @include('news.newsCart')
        @endforeach
    </div>
@endsection



