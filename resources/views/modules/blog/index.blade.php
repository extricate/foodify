@extends('layouts/app')

@section('title', 'Foodify Blog')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('blog.index') }}
    </div>
@endsection

@admin
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
@endadmin

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h1 class="display-3">
                The Foodiblog <br>
                <small class="text-muted">All about food!</small>
            </h1>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <p class="lead">
                            On our blog you'll find updates to the Foodify platform, new recipes by our chefs and
                            everything you should be in the know about - regarding food!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row card-columns">
        @foreach($posts as $post)
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-title">
                            <a href="{{ $post->path() }}">
                                <h1>{{ $post->title }}</h1>
                            </a>
                        </div>
                        <div class="card-text">
                            @if (strlen($post->content) > 200)
                                {!! Markdown::convertToHtml(str_limit($post->content, 300)) !!}
                                <p class="text-right">
                                    <a href="{{ $post->path() }}" class="btn btn-primary">Continue reading</a>
                                </p>
                            @else
                                {!! Markdown::convertToHtml($post->content) !!}
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        This entry was posted {{ $post->created_at->diffForHumans() }}.
                        @if($post->created_at->diffForHumans() < $post->updated_at->diffForHUmans())
                            This entry was modified {{ $post->updated_at->diffForHumans() }}.
                        @endif
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