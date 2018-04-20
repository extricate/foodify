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
        <h1 class="primary">Hi {{ auth()->user()->name }}</h1>
    </div>
    <div class="row">
        <div class="card-group">
            <div class="card m-1">
                <div class="card-body">
                    <div class="card-title">Your recipes</div>
                </div>
            </div>
            <div class="card m-1">
                <div class="card-body">
                    <div class="card-title">Your dietary analytics</div>
                </div>
            </div>
            <div class="card m-1">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
