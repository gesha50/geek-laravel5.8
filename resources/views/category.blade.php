@extends('layouts.app')

@section('title')Категории@endsection

@section('content')
    <h1>Категории</h1>
        @for ($i = 0; $i < count($newsCategory); $i++)
            <a class="btn btn-link" href="{{ route('category.id', $i) }}">{{  $newsCategory[$i] }}</a>
        @endfor
@endsection
