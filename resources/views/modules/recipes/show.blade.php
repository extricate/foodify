@extends('layouts/app')

@section('title', $recipe->name)

@auth
    @php $foodplan = auth()->user()->food_plan(); @endphp
@endauth
@guest
    @php $foodplan = null; @endphp
@endguest

@section('submenu')
    {{ Breadcrumbs::render('recipes.show', $recipe) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-img-container">
                    <img class="card-img-top" src="{{ $recipe->getFirstMedia()->getUrl() }}" alt="{{ $recipe->name }}">
                    @auth
                        <div class="card-favorite">
                            @include('modules.recipes.partials.favorite')
                        </div>
                    @endauth
                </div>
                <div class="card-body">
                    <div class="card-title h1 primary">{{ $recipe->name }}</div>
                    <p class="card-text">
                        {{ $recipe->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            @auth
                @if ($recipe->author()->id == auth()->user()->id || auth()->user()->isAdmin())
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text">
                                <a class="btn btn-primary" href="{{ $recipe->path() }}/edit">Edit recipe</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <i class="fal fa-star fa-fw"></i> {{ $recipe->averageRating($recipe) }}
                    </div>
                    <div class="card-text">
                        @include('modules.recipes.partials.rating', ['recipe' => $recipe])
                    </div>
                    <div class="card-text">
                        @foreach($recipe->tags as $tag)
                            <a href="/recipes/tags/{{ $tag->name }}" class="badge badge-primary">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @auth
                <div class="card">
                    <div class="card-body">
                        <h2>Plan this meal on </h2>
                        <div class="row justify-content-center">
                            @foreach ($foodplan->days() as $day)
                                @php $foodplan_day = $foodplan->$day() @endphp
                                @include('modules.foodplan.partials.plan-days-recipe', ['day' => $day, 'recipe' => $recipe, 'foodplan' => $foodplan, 'foodplan_day' => $foodplan_day])
                            @endforeach
                        </div>
                    </div>
                </div>
            @endauth
            <br>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        Ingredients
                    </h2>
                    <ul>
                        @foreach ($recipe->ingredients() as $ingredient)
                            <li>{{ $ingredient->name }}, {{ $ingredient->quantity }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <h2>What others say about this recipe</h2>

            <div class="card-columns">
                @foreach($recipe->comments()->get() as $comment)
                    @include('modules.comments.index', ['comment' => $comment])
                @endforeach
                @auth
                    @include('modules.comments.create')
                @endauth
                @guest
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                Please login to leave a comment.
                            </p>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
@endsection