@extends('layouts.app')

@section('title', 'Grocery list')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('groceries.index') }}
    </div>
@endsection

@section('submenu-buttons')
    <div class="d-none d-sm-inline-block">
        <a href="{{ route('groceries.simple') }}" class="btn btn-primary">
            Simple grocery list <i class="fal fa-shopping-bag"></i>
        </a>
    </div>
    <div class="d-sm-none">
        <a class="btn btn-primary pull-right" data-toggle="collapse" href="#submenu-buttons" role="button"
           aria-expanded="false"
           aria-controls="submenu-buttons">
            <i class="fal fa-ellipsis-v"></i>
        </a>
    </div>
@endsection

@section('submenu-buttons-mobile')
    <div class="collapse pull-right" id="submenu-buttons">
        <div class="card submenu-collapsible">
            <div class="card-body">
                <a href="{{ route('groceries.simple') }}" class="btn btn-primary">
                    Simple grocery list <i class="fal fa-shopping-bag"></i>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
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
    </div>
@endsection