@extends('layouts.admin')

@section('title')Админка@endsection

@section('content')
    <h1>Добавить Новость</h1>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <form method="POST" action="{{ route('admin.news.add') }}">

                    @csrf

                    <div class="form-group">
                        <label for="formGroupExampleInput">Заголовок</label>
                        <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Хоккоей ЧМ-2020">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Текст Новости</label>
                        <input name="description" type="text" class="form-control height" id="formGroupExampleInput2" placeholder="Победа Российской сборной...">
                    </div>
                    <select name="categories" class="form-control">
                        @for ($i = 1; $i < (count($newsCategory)+1); $i++)
                            <option value="{{ $i }}">{{  $newsCategory[$i] }}</option>
                        @endfor
                    </select>
                    <div class="custom-control custom-switch">
                        <input name="isPrivate" type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Приватная ли новость?</label>
                    </div>
                    <button type="submit" class="btn btn-success">Добавить новость</button>
                </form>
            </div>
            <div class="col">

            </div>
        </div>
    </div>

@endsection
