@extends('layouts.app')

@section('title', 'Manage all users')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('users.index') }}
    </div>
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-12">
            <h1 class="primary">Manage all users</h1>
            @foreach($users as $user)
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="{{ $user->slug() }}">{{ $user->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection