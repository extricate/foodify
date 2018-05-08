@extends('layouts.app')

@section('title', 'Dashboard')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('home') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="primary">{{ $user->name }}'s dashboard
                <small class="text-muted">This page serves as the headquarter of your Foodify planning</small>
            </h1>
        </div>
    </div>
    <div class="row mb-sm-3 mb-md-0 mt-lg-3 mb-lg-3">
        <div class="col-12">
            <div class="owl-container">
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
    @if ($user->food_plan()->isEmpty() == true)
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="alert alert-info text-center">
                    <p><strong>It appears your current food plan is empty!</strong> Would you like us to suggest some
                        meals
                        we think you'd like?</p>
                    <div class="inline-block text-center">
                        @include('modules.foodplan.partials.suggest')
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Your dietary analytics</div>
                        <div class="chart">
                            {!! $chart->container() !!}
                        </div>
                        {!! $chart->script() !!}
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Your favorites</div>
                        @if($user->showFavorites()->count() > 0)
                            @foreach($user->showFavorites() as $favorite)
                                <div class="card m-1">
                                    <div class="card-body">
                                        <a href="{{ $favorite->recipe()->getResults()->path() }}">{{ $favorite->recipe()->getResults()->name }}</a>
                                    </div>
                                </div>
                            @endforeach
                            {{ $user->showFavorites()->links() }}
                        @else
                            <div class="card-text">
                                <div class="alert alert-primary">
                                    <i class="fal fa-info-circle"></i> You can add a recipe to your favorites by
                                    pressing on the heart button on a recipe.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @admin
        @include('modules.admin.dashboard')
    @endadmin
@endsection
