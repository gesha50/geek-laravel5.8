@extends('layouts.app')

@section('title')Главная@endsection

@section('content')
<h1>Главная</h1>
<example-component></example-component>

<img src="{{ asset('storage/pause.jpeg') }}" alt="">
@endsection
