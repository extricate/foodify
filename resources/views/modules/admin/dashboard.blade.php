@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('home.admin') }}
    </div>
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="card-title">
                        Quick admin navigation
                    </div>
                    <a href="{{ route('page.create') }}" class="btn btn-primary">
                        New page
                        <i class="fal fa-plus"></i>
                    </a>

                    <a href="{{ route('users.index') }}" class="btn btn-primary">
                        Manage all users
                        <i class="fal fa-users"></i>
                    </a>

                    <a href="{{ route('comments.moderation') }}" class="btn btn-primary">
                        Go to moderation queue
                        <i class="fal fa-shield-check"></i>
                    </a>

                    <a href="{{ route('menus.index') }}" class="btn btn-primary">
                        Manage all menus
                        <i class="fal fa-bars"></i>
                    </a>

                    <a href="{{ route('admin.report') }}" class="btn btn-primary">
                        Admin reports
                        <i class="fal fa-clipboard"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="card-title">Your created recipes</div>
                    @foreach($user->recipes()->sortBy('updated_at') as $recipe)
                        <div class="card mt-2 mb-2">
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
        </div>
        <div class="col-lg-6">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="card-title">Pages</div>
                    @foreach($pages as $page)
                        <div class="card mt-2 mb-2">
                            <div class="card-body">
                                <a href="{{ route('page.show', $page) }}">{{ $page->name }}</a>
                                <a href="{{ route('page.edit', $page->id) }}"
                                   class="btn btn-primary btn-sm pull-right">
                                    <i class="fal fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-3 mb-3">
                        {{ $pages->links() }}
                    </div>
                    <div class="mt-3 mb-3 text-right">
                        <a href="{{ route('page.create') }}" class="btn btn-primary">
                            New page
                            <i class="fal fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mt-3 mb-3">
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
                    <div class="mt-3 mb-3 text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-primary">
                            Manage all users
                            <i class="fal fa-users"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mt-3 mb-3">
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
                    <div class="mt-3 mb-3 text-right">
                        <a href="{{ route('comments.moderation') }}" class="btn btn-primary">
                            Go to moderation queue
                            <i class="fal fa-shield-check"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <div class="card-title">Menus</div>
                    <div class="mt-3 mb-3 text-right">
                        <a href="{{ route('menus.index') }}" class="btn btn-primary">
                            Manage all menus
                            <i class="fal fa-bars"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection