@extends('layouts.app')

@section('title', $page->name)

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('page.show', $page) }}
    </div>
@endsection

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