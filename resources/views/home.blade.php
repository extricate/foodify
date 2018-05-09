@extends('layouts.app')

@section('title', 'Dashboard')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('home') }}
    </div>
@endsection

@admin
@section('submenu-buttons')
    <div class="d-none d-sm-inline-block">
        <a href="{{ route('home.admin') }}" class="btn btn-primary">
            Admin dashboard <i class="fal fa-user-shield"></i>
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
                <a href="{{ route('home.admin') }}" class="btn btn-primary">
                    Admin dashboard <i class="fal fa-heart"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
@endadmin

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="primary">{{ $user->name }}'s dashboard
                <small class="text-muted">This page serves as the headquarter of your Foodify planning</small>
            </h1>
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
        @php
            $today = strtolower(\Carbon\Carbon::today()->format('l'));
            $tomorrow = strtolower(\Carbon\Carbon::tomorrow()->format('l'));
        @endphp
        <div class="col-lg-8">
            @if($foodplan->$today() == !null)
                <div class="card text-white bg-primary mt-3 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <h1>Today's menu</h1>
                                <div class="text-right d-none d-lg-block">
                                    @svg('curved-arrow', 'arrow-icon')
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card text-dark">
                                    @include('modules.foodplan.partials.plan-recipe', ['recipe' => $foodplan->$today()])
                                    <div class="card-body">
                                        @include('modules.foodplan.partials.clear', ['day' => $today, 'foodplan' => $foodplan])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-4">
            @if($foodplan->$tomorrow() == !null)
                <div class="card bg-default mt-3 mb-3">
                    <div class="card-body">
                        <h3>Tomorrow's menu</h3>
                        <div class="card text-dark">
                            @include('modules.foodplan.partials.plan-recipe', ['recipe' => $foodplan->$tomorrow()])
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
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
    <div class="row">
        <div class="col-12">
            <div class="card-group mb-3">
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
@endsection
