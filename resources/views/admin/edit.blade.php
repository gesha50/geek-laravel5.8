@extends('layouts.admin')

@section('title')Админка@endsection

@section('content')
    <h1>Редактировать Новость</h1>
    <div class="container">
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Заголовок</label>
                        <input name="title" type="text"
                               class="form-control" id="formGroupExampleInput"
                               value="{{ old('title') ?? $news->title }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput1">Короткое описание</label>
                        <input name="spoiler" type="text"
                               class="form-control spoiler_height" id="formGroupExampleInput1"
                               value="{{ old('spoiler') ?? $news->spoiler }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Текст Новости</label>
                        <input name="description" type="text"
                               class="form-control height" id="formGroupExampleInput2"
                               value="{{ old('description') ?? $news->description }}">
                    </div>
                    <label for="formSelectCategories">Выберите категорию:</label>
                    <select id="formSelectCategories" name="category_id" class="form-control">
                        @foreach($newsCategory as $category)
                            <option value="{{ $category->id }}" @if($news->category_id == $category->id) selected @endif >{{  $category->title }}</option>
                        @endforeach
                    </select>
                    <div class="custom-control custom-switch m-2">
                        <input name="is_private" type="checkbox" class="custom-control-input" id="customSwitch1"
                        @if($news->is_private) checked @endif>
                        <label class="custom-control-label" for="customSwitch1">Приватная ли новость?</label>
                    </div>
                    <input type="file" class="form-control-file m-2"
                           id="exampleFormControlFile1" name="image"
                           accept="image/*" value="/storage/4TQOnbJIAvokPHs63oA9LL0TKK4QKUJ2cc6Rq6Yu.jpeg}">
                    <img class="m-2" width="200px" src="{{ $news->image }}" alt="">
                    <button type="submit" class="btn btn-success">Внести изменения</button>
                </form>
            </div>
            <div class="col">
            </div>
        </div>
    </div>

@endsection
