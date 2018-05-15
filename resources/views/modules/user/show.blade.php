@extends('layouts/app')

@section('title', 'Viewing plan of ' . $viewinguser->name)

@php $foodplan = $viewinguser->food_plan(); @endphp

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('user.show', $viewinguser) }}
    </div>
@endsection

@section('submenu-buttons')
    <div class="d-none d-sm-inline-block">
        <a href="#" class="btn btn-primary mr-1">
            Share <i class="fal fa-share"></i>
        </a>
        @admin
            @if($viewinguser->banned == false)
                @include('modules.user.partials.ban-user', ['user_id' => $viewinguser->id])
            @else
                @include('modules.user.partials.unban-user', ['user_id' => $viewinguser->id])
            @endif
            @if($viewinguser->admin == false)
                @include('modules.user.partials.admin', ['user_id' => $viewinguser->id, 'action' => true])
            @else
                @include('modules.user.partials.admin', ['user_id' => $viewinguser->id, 'action' => false])
            @endif

            @if($viewinguser->verified == false)
                @include('modules.user.partials.verified', ['user_id' => $viewinguser->id, 'action' => true])
            @else
                @include('modules.user.partials.verified', ['user_id' => $viewinguser->id, 'action' => false])
            @endif
        @endadmin
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
                <a href="#" class="btn btn-primary mr-1">
                    Share <i class="fal fa-share"></i>
                </a>
                @include('modules.user.partials.ban-user', ['user_id' => $user->id])
                @if($viewinguser->admin == false)
                    @include('modules.user.partials.admin', ['user_id' => $viewinguser->id, 'action' => true])
                @else
                    @include('modules.user.partials.admin', ['user_id' => $viewinguser->id, 'action' => false])
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
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
@endsection