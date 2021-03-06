@extends('layouts.app')

@section('title', 'Favorites')

@section('submenu')
    {{ Breadcrumbs::render('favorites.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 card-columns">
            @foreach($favorites as $favorite)
                    @include('modules.recipes.partials.recipe-card', ['recipe' => $favorite->recipe])
            @endforeach
        </div>
        <div class="m-3">
            {{ $favorites->links() }}
        </div>
    </div>
@endsection