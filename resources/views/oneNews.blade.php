@extends('layouts.app')

@section('title')Новости@endsection

@section('content')
    <h1>Вывод одной новости</h1>
    @include('news.fullNews')
@endsection



