@extends('layouts/app')

@section('content')
    <div class="row">
        <h1>Foodify recipes</h1>
    </div>
    <div class="row">
        <div class="col-8">
            @foreach($recipes as $recipe)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $recipe->name }}
                        </h5>
                        <p class="card-text">
                            {{ $recipe->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4">
            @include('modules/recipes/create')
        </div>
    </div>
@endsection