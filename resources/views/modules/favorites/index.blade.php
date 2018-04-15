@extends('layouts\app')

@section('content')
    <div class="row">
        <div class="col-8">
            <h1 class="primary">Your favorites</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card-columns">
            @foreach($favorites as $favorite)
                    @include('modules.recipes.partials.recipe-card', ['recipe' => $favorite->recipe])
            @endforeach
        </div>
        <div class="m-3">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection