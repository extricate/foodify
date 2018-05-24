<div class="card-img-container">
    <img class="card-img-top" src="{{ $recipe->getFirstMedia()->getUrl() }}" alt="{{ $recipe->name }}">
    <div class="card-favorite">
        @include('modules.recipes.partials.favorite')
    </div>
</div>

<div class="card-body">
    <h1 class="card-title">@if(isset($day)) <span class="badge badge-primary">{{ $day }}</span>@endif <a href="{{ $recipe->path() }}"> {{ $recipe->name }}</a></h1>
    <p class="card-text">
        {{ str_limit($recipe->description, 100) }}
    </p>
</div>