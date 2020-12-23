
<div class="card m-2">
    <h3 class="card-header">{!! $oneNews->title  !!}</h3>
    <img class="img-fluid" src="{{ $oneNews->image }}" alt="">
    <div class="card-body">
        <p class="card-text">{!! $oneNews->description !!}</p>
        <a href="{{ route('news') }}" class="btn btn-primary">назад</a>
    </div>
</div>
