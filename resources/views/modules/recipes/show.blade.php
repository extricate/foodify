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
                <img class="card-img-top" src="{{ $recipe->getFirstMedia()->getUrl() }}" alt="{{ $recipe->name }}">
                <div class="card-body">
                    @php dd($recipe->getMedia()) @endphp
                    <p class="card-text">
                        <i class="fal fa-star fa-fw"></i> {{ $recipe->averageRating($recipe) }}
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