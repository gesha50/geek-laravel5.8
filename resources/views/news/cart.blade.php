
<div class="col-md-4 card m-2 @if($item->is_private) bg-warning @endif">
    <img src="{{ $item->image }}"
        class="height_250" alt="Card image">
    <h3 class="card-header">{{ $item->title }}</h3>
    <div class="card-body">
        <p class="card-text">{{ $item->spoiler }}</p>
        @if(isset($isAdmin))
            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning">Редактировать</a>

            <form class="btn" action="{{ route('admin.news.destroy', $item->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit" >x</button>
            </form>
        @else
            <a href="{{ route('news.id', $item) }}" class="btn btn-primary">Читать подробнее...</a>
        @endif
    </div>
</div>

