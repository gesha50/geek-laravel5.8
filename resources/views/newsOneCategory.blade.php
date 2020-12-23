@extends('layouts.app')

@section('title')Категории@endsection

@section('content')
    <h1>Новости категории <strong>{{ $nameCategory }}</strong></h1>
    <div class="d-flex flex-wrap justify-content-start">
    @foreach ($oneCategory as $item)
        @include('news.cart')
    @endforeach
    </div>
@endsection
