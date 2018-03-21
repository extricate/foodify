@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-8">
            <h1 class="primary">{{ $recipe->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        {{ $recipe->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        Base ingredients
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
@endsection