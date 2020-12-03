@section('aside')
    <div class="list-group margin">
        <a href="{{ route('category') }}" class="list-group-item active">Категории</a>
        @foreach($newsCategory as $category)
            <a class="list-group-item list-group-item-action" href="{{ route('category.id', $category->id) }}">{{  $category->title }}</a>
        @endforeach
    </div>
@show

