@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-6">
            <a href="{{ route('favorites.index') }}" class="btn btn-primary m-1">My favorites <i class="fal fa-heart"></i></a>
            <a href="{{ route('favorites.index') }}" class="btn btn-primary m-1">Suggestions <i class="fal fa-badge-check"></i></a>
        </div>
        <div class="col-6">
            <form class="form-inline m-3 pull-right">
                <input class="form-control" type="search" id="search" placeholder="What are you craving for?"
                       aria-label="Type here to search">
                <button class="btn btn-primary m-1" type="submit">Search <i class="fal fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 justify-content-center">
        </div>
    </div>
    <div class="row">
        <div class="col-12 card-columns">
        @foreach($recipes as $recipe)
                @include('modules.recipes.partials.recipe-card-full', ['foodplan' => Auth::user()->food_plan()])
        @endforeach
        </div>
        <div class="m-3">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection