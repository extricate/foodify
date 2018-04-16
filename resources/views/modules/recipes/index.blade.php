@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <a href="{{ route('favorites.index') }}" class="btn btn-primary">My favorites <i
                        class="fal fa-heart"></i></a>
            <a href="{{ route('favorites.index') }}" class="btn btn-primary">Suggestions <i
                        class="fal fa-badge-check"></i></a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <form class="form-group">
                <div class="input-group">
                    <input class="form-control" type="search" id="search" placeholder="What are you craving for?" aria-label="Type here to search">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search <i class="fal fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
            <div class="pull-right">
                {{ $recipes->links() }}
            </div>
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
    </div>
@endsection