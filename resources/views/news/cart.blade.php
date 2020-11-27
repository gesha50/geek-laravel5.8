
    <div class="card m-2">
        <h3 class="card-header">{{ $item['title'] }}</h3>
        <div class="card-body">
            <p class="card-text">{{ $item['description'] }}</p>
            <a href="{{ route('news.id', $item['id']) }}" class="btn btn-primary">Читать подробнее...</a>
            @if(isset($isAdmin))
            <a href="{{ route('admin.news.delete', $item['id']) }}" class="btn btn-danger" >x</a>
            @endif
        </div>
    </div>
