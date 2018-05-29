@extends('layouts/app')

@section('title', 'Recipes')

@auth
    @php $foodplan = auth()->user()->food_plan(); @endphp
@endauth
@guest
    @php $foodplan = null; @endphp
@endguest

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('recipes.index') }}
    </div>
@endsection

@section('submenu-buttons')
    <div class="d-none d-sm-inline-block">
        <a href="{{ route('favorites.index') }}" class="btn btn-primary">
            My favorites <i class="fal fa-heart"></i>
        </a>
        <a href="{{ route('favorites.index') }}" class="btn btn-primary">
            Suggestions <i class="fal fa-badge-check"></i>
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
                <a href="{{ route('favorites.index') }}" class="btn btn-primary">
                    My favorites <i class="fal fa-heart"></i>
                </a>
                <a href="{{ route('favorites.index') }}" class="btn btn-primary">
                    Suggestions <i class="fal fa-badge-check"></i>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="ais-container">
        <recipe-search-component></recipe-search-component>
    </div>
    @auth
        @if(auth()->user()->getSetting('show_plan_on_recipe_index'))
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="owl-container m-3">
                            <div class="owl-carousel owl-theme">
                                @foreach($foodplan->days() as $day)
                                    @php $recipe = $foodplan->$day(); @endphp
                                    <div class="item">
                                        @include('modules.foodplan.partials.plan-days-large', ['recipe' => $recipe])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
    <div class="row">
        @foreach($recipes as $recipe)
            <div class="col-lg-4 col-sm-12 mb-3 mt-3">
                @include('modules.recipes.partials.recipe-card-full', ['foodplan' => $foodplan])
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col d-flex d-justify-content-center">
            <div class="mx-auto">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>
@endsection