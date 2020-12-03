@extends('layouts.app')

@section('title')Категории@endsection

@section('content')
    <h1>Категории</h1>
    <ul class="list-group list-group-horizontal">
        @foreach($newsCategory as $category)
            <a class="list-group-item list-group-item-action" href="{{ route('category.id', $category->id) }}">{{  $category->title }}</a>
        @endforeach
    </ul>

@endsection
