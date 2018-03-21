<div class="card m-3">
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
        <div class="container">
            <div class="row justify-content-center">
                @include('modules/foodplan/partials/plan-days', ['day' => 'monday', 'day_short' => 'Mo', 'recipe' => $recipe])
                @include('modules/foodplan/partials/plan-days', ['day' => 'tuesday', 'day_short' => 'Tu', 'recipe' => $recipe])
                @include('modules/foodplan/partials/plan-days', ['day' => 'wednesday', 'day_short' => 'We', 'recipe' => $recipe])
                @include('modules/foodplan/partials/plan-days', ['day' => 'thursday', 'day_short' => 'Th', 'recipe' => $recipe])
                @include('modules/foodplan/partials/plan-days', ['day' => 'friday', 'day_short' => 'Fr', 'recipe' => $recipe])
                @include('modules/foodplan/partials/plan-days', ['day' => 'saturday', 'day_short' => 'Sa', 'recipe' => $recipe])
                @include('modules/foodplan/partials/plan-days', ['day' => 'sunday', 'day_short' => 'Su', 'recipe' => $recipe])
            </div>
        </div>
    </div>
</div>