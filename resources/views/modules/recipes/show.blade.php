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

@admin
@section('submenu-buttons')
    <div class="d-none d-sm-inline-block">
        <a class="btn btn-primary" href="{{ $recipe->path() }}/edit">Edit recipe <i class="fal fa-edit"></i></a>
    </div>
@endsection

@section('submenu-buttons-mobile')
    <div class="collapse pull-right" id="submenu-buttons">
        <div class="card submenu-collapsible">
            <div class="card-body">
                <a class="btn btn-primary" href="{{ $recipe->path() }}/edit">Edit recipe</a>
            </div>
        </div>
    </div>
@endsection
@endadmin

@section('background-style')
    style="background-image: url('{{ $recipe->getFirstMedia()->getUrl() }}'); background-size: cover; background-attachment: fixed; margin-top: -1.2em; margin-bottom: -1em; padding-top: 1em; padding-bottom: 1em;"
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
                    <div class="card-title h1 primary">@if($recipe->deleted)
                            <div class="badge badge-danger">Deleted</div> @endif{{ $recipe->name }}</div>
                    <p class="card-text">
                        {!! Markdown::convertToHtml($recipe->description) !!}
                    </p>
                </div>
            </div>
            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Comments</h2>
                            @foreach($recipe->comments()->orderBy('created_at', 'desc')->get() as $comment)
                                @include('modules.comments.index', ['comment' => $comment])
                            @endforeach
                            @auth
                                @if(auth()->user()->banned == false)
                                    @include('modules.comments.create')
                                @else
                                    <div class="card mt-3 mb-3">
                                        <div class="card-body">
                                            <div class="card-text">
                                                You are banned and therefore cannot post a comment.
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                            @guest
                                <div class="card mt-3 mb-3">
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
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-text">
                        <h2>Details <span class="badge badge-secondary">(under construction)</span></h2>
                        <div class="card-text">
                            Preparation time:
                            @if($recipe->preparation_time > 0)
                                {{ $recipe->preparation_time }} minutes
                            @else
                                not set.
                            @endif
                        </div>
                        <span class="badge badge-primary">
                            <i class="fal fa-star fa-fw"></i> {{ $recipe->averageRating($recipe) }}
                        </span>
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
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title">
                        Ingredients
                    </h2>
                    <ul>
                        @foreach ($recipe->ingredients as $ingredient)
                            <li>{{ $ingredient->name }}, {{ $ingredient->quantity }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @auth
                <div class="card mb-3">
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
        </div>
    </div>
@endsection