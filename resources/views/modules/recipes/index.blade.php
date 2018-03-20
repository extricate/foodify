@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 class="primary">Foodify recipes</h1>

            <form class="form-inline m-3">
                <input class="form-control" type="search" id="search" placeholder="What are you craving for?" aria-label="Type here to search">
                <button class="btn btn-primary m-1" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 justify-content-center">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($recipes as $recipe)
                    <div class="col-6">
                        @include('modules.recipes.partials.recipe-card-full')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection