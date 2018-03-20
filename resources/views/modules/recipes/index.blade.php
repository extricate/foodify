@extends('layouts/app')

@section('content')
        <h1 class="primary m-3">Foodify recipes
        <a href="/recipes/create" class="btn btn-primary">Create new recipe</a>
        </h1>
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