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
            <h1 class="primary">Hi {{ $user->name }}, this is your dashboard</h1>
            <p>This page serves as the headquarter of your fooodify planning.</p>
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
    <div class="row mb-sm-3 mb-md-0 mt-lg-1">
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
                        @foreach($user->showFavorites() as $favorite)
                            <div class="card m-1">
                                <div class="card-body">
                                    <a href="{{ $favorite->recipe()->getResults()->path() }}">{{ $favorite->recipe()->getResults()->name }}</a>
                                </div>
                            </div>
                        @endforeach
                        {{ $user->showFavorites()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->user()->admin == true)
        <div class="row mt-3">
            <div class="col-12">
                <h1 class="primary">Admin section</h1>
            </div>
            <div class="col-12">
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Your created recipes</div>
                            @foreach($user->recipes()->sortBy('updated_at') as $recipe)
                                <div class="card m-1">
                                    <div class="card-body">
                                        <a href="{{ $recipe->path() }}">{{ $recipe->name }}</a>
                                        <a href="{{ $recipe->path() }}/edit" class="btn btn-primary btn-sm pull-right">Edit</a>
                                    </div>
                                </div>
                            @endforeach
                            {{ $user->recipes()->links() }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Latest registered users</div>
                            @foreach($users as $user)
                                <div class="card m-1">
                                    <div class="card-body">
                                        <a href="{{ $user }}">{{ $user->name }}</a>
                                        <i>Created at: {{ $user->created_at }}</i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
