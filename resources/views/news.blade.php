@extends('layouts.app')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>
    <div class="d-flex flex-wrap justify-content-start">
        @foreach ($news['news'] as $item)
        @include('news.cart')
        @endforeach
    </div>
@endsection



