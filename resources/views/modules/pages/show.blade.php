@extends('layouts.app')

@section('title', $page->name)

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('page.show', $page) }}
    </div>
@endsection

@admin
    @section('submenu-buttons')
        <div class="d-none d-sm-inline-block">
            <a class="btn btn-primary" href="{{ route('page.edit', $page) }}">Edit page <i class="fal fa-edit"></i></a>
        </div>
        <div class="d-none d-sm-inline-block">
            <a class="btn btn-danger" href="{{ route('page.destroy', $page) }}">
                Delete recipe
                <i class="fal fa-trash"></i>
            </a>
        </div>
    @endsection

    @section('submenu-buttons-mobile')
        <div class="collapse pull-right" id="submenu-buttons">
            <div class="card submenu-collapsible">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('page.edit', $page) }}">Edit page <i class="fal fa-edit"></i></a>
                    <a class="btn btn-danger" href="{{ route('page.destroy', $page) }}">Delete recipe</a>
                </div>
            </div>
        </div>
    @endsection
@endadmin

@section('content')
    <div class="page mh-100 h-100">
        <div class="row">
            <div class="col-6">
                <h1 class="primary">{{ $page->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                {{ $page->text }}
            </div>
        </div>
    </div>
@endsection