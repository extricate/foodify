@extends('layouts.app')

@section('title', 'All menus')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('menus.index') }}
    </div>
@endsection

@admin
@section('submenu-buttons')
    <div class="d-none d-sm-inline-block">
        <a href="{{ route('menus.create') }}" class="btn btn-primary">
            Create menu <i class="fal fa-plus"></i>
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
                <a href="{{ route('menus.create') }}" class="btn btn-primary">
                    Create menu <i class="fal fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
@endadmin

@section('content')
    <div class="row">
        <div class="col">
            @foreach($menus as $menu)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="{{ route('menus.show', $menu) }}">{{ $menu->name }}</a>
                            @admin
                            <a href="{{ route('menus.edit', $menu) }}"
                               class="btn btn-primary btn-sm pull-right">
                                <i class="fal fa-edit"></i>
                            </a>
                            @endadmin
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection