@extends('layouts.app')

@section('title', 'Moderate comments')

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
            @foreach($comments as $comment)
                <div class="card mt-2">
                    <div class="card-body">
                        On
                        <a href="{{ $comment->onRecipe()->getResults()->path()}}">
                            {{ $comment->onRecipe()->getResults()->name }}
                        </a>
                        <a href="{{ route('user.show', $comment->author()->id) }}">
                            {{ $comment->author()->name }}
                        </a>
                        said:
                        <div class="card-text">
                            <strong>"{{ str_limit($comment->text, 100) }}"</strong>
                        </div>
                        <div class="card-text text-right">
                            <div class="badge badge-primary badge-pill"
                                 title="{{ $comment->created_at }}">
                                Posted {{ $comment->created_at->diffForHumans() }}
                            </div>
                            <br>
                            @if ($comment->created_at != $comment->updated_at)
                                <div class="badge badge-primary badge-pill"
                                     title="{{ $comment->updated_at }}">
                                    Updated {{ $comment->updated_at->diffForHumans() }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('modules.comments.partials.actions')
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection