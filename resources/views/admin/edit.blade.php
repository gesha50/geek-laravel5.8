@extends('layouts.admin')

@section('title')Админка@endsection

@section('content')
    <h1>Редактировать Новость</h1>
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="formGroupExampleInput">Заголовок</label>
                        <input name="title" type="text" dusk="title"
                               class="form-control @error('title') is-invalid @enderror"
                               id="formGroupExampleInput"
                               value="{{ old('title' , $news->title) }}">
                    </div>
                    @foreach($errors->get('title') as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach

                    <div class="form-group">
                        <label for="formGroupExampleInput1">Короткое описание</label>
                        <input name="spoiler" type="text" dusk="spoiler"
                               class="form-control spoiler_height @error('spoiler') is-invalid @enderror"
                               id="formGroupExampleInput1"
                               value="{{ old('spoiler' , $news->spoiler) }}">
                    </div>
                    @foreach($errors->get('spoiler') as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Текст Новости</label>
                        <input name="description" type="text" dusk="description"
                               class="form-control height @error('description') is-invalid @enderror"
                               id="formGroupExampleInput2"
                               value="{{ old('description' , $news->description) }}">
                    </div>
                    @foreach($errors->get('description') as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                    <label for="formSelectCategories">Выберите категорию:</label>
                    <select id="formSelectCategories" name="category_id" class="form-control">
                        @foreach($newsCategory as $category)
                            <option value="{{ $category->id }}" @if(old('category_id', $news->category_id) == $category->id) selected @endif >{{  $category->title }}</option>
                        @endforeach
                    </select>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="is_private" id="exampleRadios1" value="1"
                               @if(old('is_private', $news->is_private) == true) checked @endif>
                        <label class="form-check-label" for="exampleRadios1">Приватная</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                               name="is_private" id="exampleRadios2" value="0"
                               @if(old('is_private', $news->is_private) == false) checked @endif>
                        <label class="form-check-label" for="exampleRadios2">Публичная</label>
                    </div>

                    <input type="file" class="form-control-file m-2"
                           id="exampleFormControlFile1" name="image"
                           accept="image/*" value="/storage/4TQOnbJIAvokPHs63oA9LL0TKK4QKUJ2cc6Rq6Yu.jpeg}">
                    <img class="m-2" width="200px" src="{{old('image', $news->image) }}" alt="">
                    <button dusk="submit" type="submit" class="btn btn-success">Внести изменения</button>
                </form>
                </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        var spoiler = document.getElementById('formGroupExampleInput1')
        CKEDITOR.replace(spoiler, options);
        var description = document.getElementById('formGroupExampleInput2')
        CKEDITOR.replace(description, options);
    </script>
@endpush
