@extends('layouts/app')

@section('title', 'Viewing plan of ' . $viewinguser->name)

@php $foodplan = $viewinguser->food_plan(); @endphp

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('user.show', $viewinguser) }}
    </div>
@endsection

@section('content')
    <div class="row mb-sm-3 mb-md-0 mt-lg-1">
        <div class="col-12">
            <div class="owl-container">
                <div class="owl-carousel owl-theme">
                    @if($foodplan != null)
                        @foreach($foodplan->days() as $day)
                            @php $recipe = $foodplan->$day(); @endphp
                            <div class="item">
                                @include('modules.foodplan.partials.plan-days-large', ['recipe' => $recipe])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection