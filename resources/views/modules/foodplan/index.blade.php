@extends('layouts.app')

@section('title', 'Your foodplan')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('foodplan.index') }}
    </div>
@endsection

@section('submenu-buttons')
    <div class="d-none d-md-inline-block">
        <div class="justify-content-end clearfix">
            <div class="row">
                <div class="col">
                    @include('modules.foodplan.partials.save-to-history')
                </div>
                <div class="col">
                    @include('modules.foodplan.partials.suggest')
                </div>
                <div class="col">
                    @include('modules.foodplan.partials.delete')
                </div>
            </div>
        </div>
    </div>
    <div class="d-inline-block d-md-none pull-right">
        <a class="btn btn-primary" data-toggle="collapse" href="#submenu-buttons" role="button" aria-expanded="false"
           aria-controls="submenu-buttons">
            <i class="fal fa-ellipsis-v"></i>
        </a>
    </div>
@endsection

@section('submenu-buttons-mobile')
    <div class="collapse pull-right" id="submenu-buttons">
        <div class="card submenu-collapsible">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @include('modules.foodplan.partials.save-to-history')
                    </div>
                    <div class="col">
                        @include('modules.foodplan.partials.suggest')
                    </div>
                    <div class="col">
                        @include('modules.foodplan.partials.delete')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 class="primary">Your foodplan</h1>
        </div>
    </div>
    @php $today = strtolower(\Carbon\Carbon::today()->format('l')); @endphp
    @if($foodplan->$today() == !null)
        <div class="row">
            <div class="col-12">
                <div class="card text-white bg-primary mt-3 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <h2 class="card-title display-3">Today's menu</h2>
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
            </div>
        </div>
    @endif
    <div class="row">
        @foreach($foodplan->days() as $day)
            <div class="col-lg-4 col-md-6">
                <div class="card mt-3 @php if ($day == strtolower(\Carbon\Carbon::today()->format('l'))) echo 'card-today'; @endphp">
                    <h3 class="m-3 text-capitalize">{{ $day }}</h3>
                    @if ($foodplan->$day() == !null)
                        @include('modules.foodplan.partials.plan-recipe', ['recipe' => $foodplan->$day()])
                        <div class="card-body">
                            @include('modules.foodplan.partials.clear', ['day' => $day, 'foodplan' => $foodplan])
                        </div>
                    @else
                        @include('modules.foodplan.partials.empty-day')
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection