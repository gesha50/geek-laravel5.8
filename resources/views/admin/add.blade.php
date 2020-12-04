@extends('layouts.admin')

@section('title')Админка@endsection

@section('content')
    <h1>Добавить Новость</h1>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <form method="POST" action="{{ route('admin.news.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Заголовок</label>
                        <input name="title" type="text"
                               class="form-control" id="formGroupExampleInput"
                               placeholder="Хоккоей ЧМ-2020" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput1">Короткое описание</label>
                        <input name="spoiler" type="text"
                               class="form-control spoiler_height" id="formGroupExampleInput1"
                               placeholder="Победа команды в Кубке Гагарина..." value="{{ old('spoiler') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Текст Новости</label>
                        <input name="description" type="text"
                               class="form-control height" id="formGroupExampleInput2"
                               placeholder="Длинное описание..." value="{{ old('description') }}">
                    </div>
                    <label for="formSelectCategories">Выберите категорию:</label>
                    <select id="formSelectCategories" name="category_id" class="form-control">
                        @foreach($newsCategory as $category)
                            <option value="{{ $category->id }}" @if(old('categories') == $category->id) selected @endif >{{  $category->title }}</option>
                        @endforeach
                    </select>
                    <div class="custom-control custom-switch m-2">
                        <input name="is_private" type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Приватная ли новость?</label>
                    </div>
                    <input type="file" class="form-control-file"
                           id="exampleFormControlFile1" name="image"
                            accept="image/*" >
                    <button type="submit" class="btn btn-success">Добавить новость</button>
                </form>
            </div>
            <div class="col">

            </div>
        </div>
    </div>

@endsection
