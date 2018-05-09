@extends('layouts.app')

@section('title', 'All pages')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('page.index') }}
    </div>
@endsection

@admin
    @section('submenu-buttons')
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('page.create') }}" class="btn btn-primary">
                Create page <i class="fal fa-plus"></i>
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
                    <a href="{{ route('page.create') }}" class="btn btn-primary">
                        Create page <i class="fal fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    @endsection
@endadmin

@section('content')
    <div class="row">
        <div class="col">
            @foreach($pages as $page)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="{{ route('page.show', $page) }}">{{ $page->name }}</a>
                            @admin
                                <a href="{{ route('page.edit', $page->id) }}"
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