@extends('layouts.app')

@section('title', 'Grocery list')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('groceries.index') }}
    </div>
@endsection

@section('content')
    <div class="row">
        Your grocery list this week
    </div>
    <div class="row">
        @foreach($foodplan->days()->chunk(4) as $chunk)
            <div class="card-deck">
                @foreach($chunk as $day)
                    @php $recipe = $foodplan->$day(); @endphp
                    <div class="card mt-3">
                        <div class="card-img-container">
                            <img class="card-img-top" src="{{ $recipe->getFirstMedia()->getUrl() }}"
                                 alt="{{ $recipe->name }}">
                        </div>
                        <div class="card-body">
                            <a class="card-title" href="{{ $recipe->path() }}">{{ $recipe->name }}</a>
                            <ul>
                                @foreach($recipe->ingredients as $ingredient)
                                    <li>{{ $ingredient->name }}, {{ $ingredient->quantity }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection