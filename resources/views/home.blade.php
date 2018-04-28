@extends('layouts.app')

@section('title', 'Dashboard')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('home') }}
    </div>
@endsection

@section('content')
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
            <h1 class="primary">Hi {{ $user->name }}, this is your dashboard</h1>
            <p>This page serves as the headquarter of your fooodify planning.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card m-1">
                    <div class="card-body">
                        <div class="card-title">Your created recipes</div>
                        @foreach($user->recipes() as $recipe)
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ $recipe->path() }}">{{ $recipe->name }}</a>
                                </div>
                            </div>
                        @endforeach

                        {{ $user->recipes()->links() }}
                    </div>
                </div>
                <div class="card m-1">
                    <div class="card-body">
                        <div class="card-title">Your dietary analytics</div>
                    </div>
                </div>
                <div class="card m-1">
                    <div class="card-body">
                        <div class="card-title">Your favorites</div>

                        @foreach($user->showFavorites() as $favorite)
                            <div class="card">
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
@endsection
