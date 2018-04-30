@extends('layouts/app')

@section('title', 'Foodify Blog')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('blog.index') }}
    </div>
@endsection

@auth
    @if(auth()->user()->isAdmin())
    @section('submenu-buttons')
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('blog.create') }}" class="btn btn-primary">
                New blog post
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
                    <a href="{{ route('blog.create') }}" class="btn btn-primary">
                        New blog post
                    </a>
                </div>
            </div>
        </div>
    @endsection
    @endif
@endauth

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 class="display-3">
                The Foodiblog <br><small class="text-muted">All about food!</small>
            </h1>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <p class="lead">
                            On our blog you'll find updates to the Foodify platform, new recipes by our chefs and everything you should be in the know about - regarding food!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-title">
                            <a href="{{ $post->path() }}">
                                {{ $post->title }} - <i>{{$post->created_at}}</i>
                            </a>
                        </div>
                        <div class="card-text">
                            {{ $post->content }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col d-flex d-justify-content-center">
            <div class="mx-auto">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection