@extends('layouts.admin')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>
    <div class="d-flex flex-wrap justify-content-start row">
        @foreach ($users as $user)
            <div class="col-md-4 card m-2 @if($user->is_private) bg-warning @endif">
                <img src="{{ $user->image }}"
                     class="height_250" alt="User image">
                <h3 class="card-header">{{ $user->name }}</h3>
                <div class="card-body">
                    <p class="card-text">{{ $user->email }}</p>
                    <p class="card-text">{{ $user->role }}</p>

                    {{--                        <a href="{{ route('admin.$users.edit', $user->id) }}" class="btn btn-warning">Редактировать</a>--}}

{{--                        <form class="btn" action="{{ route('admin.$users.destroy', $item->id) }}" method="POST">--}}
{{--                            @method('DELETE')--}}
{{--                            @csrf--}}
{{--                            <button class="btn btn-danger" type="submit" >x</button>--}}
{{--                        </form>--}}
                </div>
            </div>
{{--            @include('news.cart')--}}
        @endforeach
    </div>
    {{ $users->links() }}
@endsection
