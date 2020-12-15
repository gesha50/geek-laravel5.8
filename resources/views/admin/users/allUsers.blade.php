@extends('layouts.admin')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>
    <div class="d-flex flex-wrap justify-content-start row">

        @foreach ($users as $user)
            <user-edit-component
                :user="{{ json_encode($user) }}"
                :roles="{{ json_encode($roles) }}"
            ></user-edit-component>
        @endforeach
    </div>
{{--    {{ $users->links() }}--}}
@endsection
