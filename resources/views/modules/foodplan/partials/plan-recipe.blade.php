<div class="card-img-container">
    <img class="card-img-top" src="{{ $recipe->getFirstMedia()->getUrl() }}" alt="{{ $recipe->name }}">
    @if(isset($day))
        <h1 class="card-day">
            <span class="badge @if($day == strtolower(\Carbon\Carbon::today()->format('l'))) badge-primary @else badge-secondary @endif">{{ $day }}</span>
        </h1>
    @endif
    <div class="card-favorite">
        @include('modules.recipes.partials.favorite')
    </div>
</div>

<div class="card-body">
    <h1 class="card-title"><a href="{{ $recipe->path() }}"> {{ $recipe->name }}</a></h1>
    <p class="card-text">
        {{ str_limit($recipe->description, 100) }}
    </p>
</div>