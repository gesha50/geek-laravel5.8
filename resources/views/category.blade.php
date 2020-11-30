@extends('layouts.app')

@section('title')Категории@endsection

@section('content')
    <h1>Категории</h1>
        @for ($i = 1; $i < (count($newsCategory)+1); $i++)
            <a class="btn btn-link" href="{{ route('category.id', $i) }}">{{  $newsCategory[$i] }}</a>
        @endfor
@endsection
