@extends('layouts.app')

@section('title', 'All pages')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('page.index') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            @foreach($pages as $page)
                <div class="card">
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