@extends('layouts.admin')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>
    <div class="d-flex flex-wrap justify-content-start row">
        @foreach ($users as $user)
            <user-edit-component
                :initial-user="{{ json_encode($user) }}"
                :initial-roles="{{ json_encode($roles) }}"
            ></user-edit-component>
        @endforeach
    </div>
{{--    {{ $users->links() }}--}}
@endsection
