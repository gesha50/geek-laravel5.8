@extends('layouts.admin')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>
            <user-edit-component
                :initial-users="{{ json_encode($users) }}"
                :initial-roles="{{ json_encode($roles) }}"
            ></user-edit-component>
{{--    {{ $users->links() }}--}}
@endsection
