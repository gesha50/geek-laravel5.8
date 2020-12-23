@extends('layouts.admin')

@section('title')Админка@endsection

@section('content')
    <h1>Добавить Новость</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupTitle">Заголовок</label>
                                <textarea name="title" type="text"
                                          class="form-control @error('title') is-invalid @enderror"
                                          id="formGroupTitle"
                                          placeholder="Хоккоей ЧМ-2020">
                            {{ old('title') }}
                        </textarea>
                            </div>
                            @foreach($errors->get('title') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach


                            <div class="form-group">
                                <label for="formGroupSpoiler">Короткое описание</label>
                                <textarea name="spoiler" type="text"
                                          class="form-control spoiler_height @error('spoiler') is-invalid @enderror"
                                          id="formGroupSpoiler"
                                          placeholder="Победа команды в Кубке Гагарина...">
                            {{ old('spoiler') }}
                        </textarea>
                            </div>
                            @foreach($errors->get('spoiler') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach


                            <div class="form-group">
                                <label for="formGroupDescription">Текст Новости</label>
                                <textarea name="description" type="text"
                                          class="form-control height @error('description') is-invalid @enderror"
                                          id="formGroupDescription"
                                          placeholder="Длинное описание...">
                            {{ old('description') }}
                        </textarea>
                            </div>
                            @foreach($errors->get('description') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach


                            <label for="formSelectCategories">Выберите категорию:</label>
                            <select id="formSelectCategories" name="category_id" class="form-control">
                                @foreach($newsCategory as $category)
                                    <option value="{{ $category->id }}"
                                            @if(old('category_id') == $category->id) selected @endif >{{  $category->title }}</option>
                                @endforeach
                            </select>


                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_private" id="exampleRadios1"
                                       value="1">
                                <label class="form-check-label" for="exampleRadios1">Приватная</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_private" id="exampleRadios2"
                                       value="0" checked>
                                <label class="form-check-label" for="exampleRadios1">Публичная</label>
                            </div>


                            <input type="file" class="form-control-file m-2"
                                   id="exampleFormControlFile1" name="image"
                                   accept="image/*">
                            <button type="submit" class="btn btn-success">Добавить новость</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- Дополнительные скрипты подключаем для редактирования --}}

@push('js')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        CKEDITOR.replace('formGroupTitle', options);
        CKEDITOR.replace('formGroupSpoiler', options);
        CKEDITOR.replace('formGroupDescription', options);
    </script>
@endpush
