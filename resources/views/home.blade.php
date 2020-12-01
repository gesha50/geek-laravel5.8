@extends('layouts.app')

@section('title')Главная@endsection

@section('content')
<h1>Главная</h1>
<example-component></example-component>
{{--Из-за vagrant так не работает!!--}}
{{--<img src="{{ asset('storage/pause.jpeg') }}" alt="">--}}
@endsection
