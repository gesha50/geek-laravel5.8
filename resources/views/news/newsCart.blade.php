
    <div class="card m-2">
        <h3 class="card-header">{{ $item['title'] }}</h3>
        <div class="card-body">
            <p class="card-text">{{ $item['description'] }}</p>
            <a href="{{ route('news_id', $item['id']) }}" class="btn btn-primary">Читать подробнее...</a>
        </div>
    </div>
