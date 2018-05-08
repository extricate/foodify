@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('home.admin') }}
    </div>
@endsection

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <h1 class="primary">Quick admin panel</h1>
        </div>
        <div class="col-12">
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Your created recipes</div>
                        @foreach($user->recipes()->sortBy('updated_at') as $recipe)
                            <div class="card m-1">
                                <div class="card-body">
                                    <a href="{{ $recipe->path() }}">{{ $recipe->name }}</a>
                                    <a href="{{ $recipe->path() }}/edit" class="btn btn-primary btn-sm pull-right">
                                        <i class="fal fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-3 mb-3">
                            {{ $user->recipes()->links() }}
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Latest registered users</div>
                        @foreach($users as $user)
                            <div class="card m-1">
                                <div class="card-body">
                                    <a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                                    <i>Created at: {{ $user->created_at }}</i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Latest comments</div>
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
            </div>
        </div>
    </div>
@endsection