@section('aside')
    <div class="list-group margin">
        <a href="{{ route('category') }}" class="list-group-item active">Категории</a>
        @for ($i = 1; $i < (count($newsCategory)+1); $i++)
            <a class="list-group-item list-group-item-action" href="{{ route('category.id', $i) }}">{{  $newsCategory[$i] }}</a>
        @endfor
    </div>
@show

