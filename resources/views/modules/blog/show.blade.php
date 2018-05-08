@extends('layouts/app')

@section('title', 'Foodify Blog')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('blog.show', $post) }}
    </div>
@endsection


@admin
    @section('submenu-buttons')
        <div class="d-none d-sm-inline-block">
            <a href="{{ route('blog.create') }}" class="btn btn-primary">
                New blog post
            </a>
            <a href="{{ route('blog.edit', $post) }}" class="btn btn-primary">
                Edit this blog
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
                    <br>
                    <a href="{{ route('blog.edit', $post) }}" class="btn btn-primary">
                        Edit this blog
                    </a>
                </div>
            </div>
        </div>
    @endsection
@endadmin

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $post->title }}</h1>
                    <div class="card-text">
                        {!! Markdown::convertToHtml($post->content) !!}
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
    </div>
@endsection