<div class="card">
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
        <div class="card-text">
            {{--@foreach($recipe->tags() as $tag)
                <a href="/recipes/tags/{{ $tag->name }}" class="badge badge-primary">{{ $tag->name }}</a>
            @endforeach--}}
        </div>
        <div class="container pl-5 pr-5">
            <div class="row justify-content-center">
                @foreach ($foodplan->days() as $day)
                    @php $foodplan_day = $foodplan->$day() @endphp
                    @include('modules.foodplan.partials.plan-days', ['day' => $day, 'recipe' => $recipe, 'foodplan' => $foodplan, 'foodplan_day' => $foodplan_day])
                @endforeach
            </div>
        </div>
    </div>
</div>