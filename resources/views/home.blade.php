@extends('layouts.app')

@section('title', 'Dashboard')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('home') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="primary">{{ $user->name }}'s dashboard
                <small class="text-muted">This page serves as the headquarter of your Foodify planning</small>
            </h1>
        </div>
    </div>
    <div class="row mb-sm-3 mb-md-0 mt-lg-3 mb-lg-3">
        <div class="col-12">
            <div class="owl-container">
                <div class="owl-carousel owl-theme">
                    @foreach($foodplan->days() as $day)
                        @php $recipe = $foodplan->$day(); @endphp
                        <div class="item">
                            @include('modules.foodplan.partials.plan-days-large', ['recipe' => $recipe])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @if ($user->food_plan()->isEmpty() == true)
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="alert alert-info text-center">
                    <p><strong>It appears your current food plan is empty!</strong> Would you like us to suggest some
                        meals
                        we think you'd like?</p>
                    <div class="inline-block text-center">
                        @include('modules.foodplan.partials.suggest')
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Your dietary analytics</div>
                        <div class="chart">
                            {!! $chart->container() !!}
                        </div>
                        {!! $chart->script() !!}
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Your favorites</div>
                        @if($user->showFavorites()->count() > 0)
                            @foreach($user->showFavorites() as $favorite)
                                <div class="card m-1">
                                    <div class="card-body">
                                        <a href="{{ $favorite->recipe()->getResults()->path() }}">{{ $favorite->recipe()->getResults()->name }}</a>
                                    </div>
                                </div>
                            @endforeach
                            {{ $user->showFavorites()->links() }}
                        @else
                            <div class="card-text">
                                <div class="alert alert-primary">
                                    <i class="fal fa-info-circle"></i> You can add a recipe to your favorites by
                                    pressing on the heart button on a recipe.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->user()->admin == true)
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
                                        <a href="{{ route('user.show', $comment->author()->id) }}">{{ $comment->author()->name }}</a>
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
    @endif
@endsection
