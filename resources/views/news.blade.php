@extends('layouts.app')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>
    <div class="d-flex flex-wrap justify-content-start">
        @foreach ($news as $item)
            @if(!$item->is_private || !empty(\Auth::id()))
                @include('news.cart')
            @endif
        @endforeach
    </div>
    {{ $news->links() }}
@endsection



