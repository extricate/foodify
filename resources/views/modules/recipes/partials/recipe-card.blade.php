<div class="card">
    <div class="card-img-container">
        <img class="card-img-top" src="{{ $recipe->image_url }}" alt="{{ $recipe->name }}">


        <div class="card-favorite">
            @include('modules.recipes.partials.favorite')
        </div>
    </div>

    <div class="card-body">
        <h1 class="card-title"><a href="{{ $recipe->path() }}">{{ $recipe->name }}</a></h1>
        <p class="card-text">
            {{ str_limit($recipe->description, 100) }}
        </p>
        <div class="card-text">
            {{--@foreach($recipe->tags() as $tag)
                <a href="/recipes/tags/{{ $tag->name }}" class="badge badge-primary">{{ $tag->name }}</a>
            @endforeach--}}
        </div>
    </div>
</div>