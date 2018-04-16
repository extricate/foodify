<div class="card h-100">
    <div class="card-img-container">
        <img class="card-img-top" src="{{ $recipe->getFirstMedia()->getUrl() }}" alt="{{ $recipe->name }}">
        <div class="card-favorite">
            @include('modules.recipes.partials.favorite')
        </div>
    </div>
    <div class="card-body">
        <h1 class="card-title"><a href="{{ $recipe->path() }}">{{ $recipe->name }}</a></h1>
        <p class="card-text">
            {{ str_limit($recipe->description, 100) }}
        </p>
    </div>
    <div class="card-footer">
        <div class="container pl-5 pr-5">
            <div class="row justify-content-center">
                <h3>Plan this meal on: </h3>
                @foreach ($foodplan->days() as $day)
                    @php $foodplan_day = $foodplan->$day() @endphp
                    @include('modules.foodplan.partials.plan-days', ['day' => $day, 'recipe' => $recipe, 'foodplan' => $foodplan, 'foodplan_day' => $foodplan_day])
                @endforeach
            </div>
        </div>
    </div>
</div>