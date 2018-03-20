<div class="card">
    <img class="card-img-top" src="{{ $recipe->image_url }}" alt="{{ $recipe->name }}">
    <div class="card-body">
        <h1 class="card-title"><a href="{{ $recipe->path() }}">{{ $recipe->name }}</a></h1>
        <p class="card-text">
            {{ $recipe->description }}
        </p>
        <div class="card-text">
            @foreach($recipe->tags() as $tag)
                <a href="/recipes/tags/{{ $tag->name }}" class="badge badge-primary">{{ $tag->name }}</a>
            @endforeach
        </div>
        <a href="/" class="btn btn-primary">Something else?</a>
        <a href="/" class="btn btn-danger">Clear day</a>
    </div>
</div>