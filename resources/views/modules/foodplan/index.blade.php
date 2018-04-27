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
    <div class="row">
        <div class="card-columns col-12">
            @foreach($foodplan->days() as $day)
                <div class="card">
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
            @endforeach
        </div>
    </div>
@endsection